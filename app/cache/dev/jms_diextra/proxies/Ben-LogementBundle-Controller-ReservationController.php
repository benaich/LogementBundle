<?php

namespace EnhancedProxy480ea229_4e652490c60cbf5f58509fab95e009522e766ec6\__CG__\Ben\LogementBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class ReservationController extends \Ben\LogementBundle\Controller\ReservationController
{
    private $__CGInterception__loader;

    public function updateAction(\Symfony\Component\HttpFoundation\Request $request, \Ben\LogementBundle\Entity\Reservation $entity)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\ReservationController', 'updateAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request, $entity));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request, $entity), $interceptors);

        return $invocation->proceed();
    }

    public function showAction(\Ben\LogementBundle\Entity\Reservation $entity)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\ReservationController', 'showAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($entity));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($entity), $interceptors);

        return $invocation->proceed();
    }

    public function setStatusAction(\Ben\LogementBundle\Entity\Reservation $entity, $status)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\ReservationController', 'setStatusAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($entity, $status));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($entity, $status), $interceptors);

        return $invocation->proceed();
    }

    public function newAction(\Ben\LogementBundle\Entity\Person $person)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\ReservationController', 'newAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($person));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($person), $interceptors);

        return $invocation->proceed();
    }

    public function indexAction($page, $perPage, $status)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\ReservationController', 'indexAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($page, $perPage, $status));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($page, $perPage, $status), $interceptors);

        return $invocation->proceed();
    }

    public function editAction(\Ben\LogementBundle\Entity\Reservation $entity)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\ReservationController', 'editAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($entity));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($entity), $interceptors);

        return $invocation->proceed();
    }

    public function deleteAction(\Symfony\Component\HttpFoundation\Request $request, \Ben\LogementBundle\Entity\Reservation $entity)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\ReservationController', 'deleteAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request, $entity));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request, $entity), $interceptors);

        return $invocation->proceed();
    }

    public function createAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\ReservationController', 'createAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}