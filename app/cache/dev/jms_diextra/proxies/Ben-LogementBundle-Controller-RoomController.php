<?php

namespace EnhancedProxy480ea229_894f276d33125d52fde90f280956ee10a7017493\__CG__\Ben\LogementBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class RoomController extends \Ben\LogementBundle\Controller\RoomController
{
    private $__CGInterception__loader;

    public function updateAction(\Symfony\Component\HttpFoundation\Request $request, \Ben\LogementBundle\Entity\Room $entity)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\RoomController', 'updateAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request, $entity));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request, $entity), $interceptors);

        return $invocation->proceed();
    }

    public function toExcelAction()
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\RoomController', 'toExcelAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function switchAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\RoomController', 'switchAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request), $interceptors);

        return $invocation->proceed();
    }

    public function showAction(\Ben\LogementBundle\Entity\Room $entity)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\RoomController', 'showAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($entity));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($entity), $interceptors);

        return $invocation->proceed();
    }

    public function setFreeAction(\Ben\LogementBundle\Entity\Room $entity)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\RoomController', 'setFreeAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($entity));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($entity), $interceptors);

        return $invocation->proceed();
    }

    public function newMultipleAction()
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\RoomController', 'newMultipleAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function newAction()
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\RoomController', 'newAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function indexAction()
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\RoomController', 'indexAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function freeRoomsAction(\Symfony\Component\HttpFoundation\Request $request, \Ben\LogementBundle\Entity\Person $person)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\RoomController', 'freeRoomsAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request, $person));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request, $person), $interceptors);

        return $invocation->proceed();
    }

    public function editAction(\Ben\LogementBundle\Entity\Room $entity)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\RoomController', 'editAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($entity));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($entity), $interceptors);

        return $invocation->proceed();
    }

    public function deleteAction(\Symfony\Component\HttpFoundation\Request $request, \Ben\LogementBundle\Entity\Room $entity)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\RoomController', 'deleteAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request, $entity));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request, $entity), $interceptors);

        return $invocation->proceed();
    }

    public function createMultipleAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\RoomController', 'createMultipleAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request), $interceptors);

        return $invocation->proceed();
    }

    public function createAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\RoomController', 'createAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request), $interceptors);

        return $invocation->proceed();
    }

    public function ajaxListAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\RoomController', 'ajaxListAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}