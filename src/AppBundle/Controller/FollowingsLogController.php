<?php

namespace AppBundle\Controller;

use AppBundle\Entity\FollowingsLog;
use AppBundle\Entity\Link;
use AppBundle\Entity\Repository\FollowingsLogRepository;
use AppBundle\Entity\Repository\LinkRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\Query;
use Knp\Component\Pager\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class FollowingsLogController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function addAction(Request $request)
    {
        //request options
        $isShort = $request->request->get('isShort');
        $href = $request->request->get('link');


        if ($isShort == true) {
            /** @var ObjectManager $em */
            $em = $this->getDoctrine()->getManager();
            /** @var LinkRepository $linkRepository */
            $linkRepository = $em->getRepository('AppBundle:Link');
            /** @var Link $link */
            $link = $linkRepository->findOneBy(
                [
                    'short' => $href,
                ]
            );

            if ((empty($link->getLifetimeTo()) || $link->getLifetimeTo()->format('U') >= time()) && $link->getActive() == true) {

                $referer = $request->headers->get('referer');
                $browser = $request->headers->get('user-agent');
                $remoteAddr = $request->server->get('REMOTE_ADDR');

                $followingsLog = new FollowingsLog();
                $followingsLog->setBrowser($browser);
                $followingsLog->setIp($remoteAddr);
                $followingsLog->setReferer($referer);
                $followingsLog->setLink($link);
                $em->persist($followingsLog);
                $em->flush();

                //response options
                return new JsonResponse(
                    [
                        'original' => $link->getOriginal(),
                    ]
                );
            } else {
                return new JsonResponse(
                    [
                        'error' => 'The short link you are following does not work. It is possibly, the link is not active or lifetime of the one is expired!',
                    ],
                    404
                );
            }
        }

        return new JsonResponse(
            [
                'error' => 'You have followed not by short link. Possibly, you pointed wrong URL in your AJaX query',
            ],
            404
        );
    }

    /**
     * @param Link $link
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewLinkStatisticsAction(Link $link, Request $request)
    {
        /** @var ObjectManager $em */
        $em = $this->getDoctrine()->getManager();
        /** @var FollowingsLogRepository $followingsLinkRepository */
        $followingsLogRepository = $em->getRepository('AppBundle:FollowingsLog');
        /** @var Query $followingsLogQuery */
        $followingsLogQuery = $followingsLogRepository->viewLinkStatistics($link);
        /** @var Paginator $paginator */
        $paginator = $this->get('knp_paginator');
        $paginator->setDefaultPaginatorOptions(
            [
                'distinct' => false,
            ]
        );
        $paginatedFollowingsLog = $paginator->paginate(
            $followingsLogQuery,
            $request->query->getInt('page', 1),
            20
        );

        return $this->render('@App/FollowingsLog/viewLinkStatistics.html.twig',
            [
                'shortLink' => $link->getShort(),
                'paginatedFollowingsLog' => $paginatedFollowingsLog,
            ]
        );
    }
}
