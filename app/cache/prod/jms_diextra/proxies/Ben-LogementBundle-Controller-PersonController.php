<?php

namespace EnhancedProxyc1729f3f_420f74158b596624dc39bc3f65860a7602d6ccb0\__CG__\Ben\LogementBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class PersonController extends \Ben\LogementBundle\Controller\PersonController
{
    private $__CGInterception__loader;

    public function validateListAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\PersonController', 'validateListAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request), $interceptors);

        return $invocation->proceed();
    }

    public function updateAction(\Symfony\Component\HttpFoundation\Request $request, \Ben\LogementBundle\Entity\Person $entity)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\PersonController', 'updateAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request, $entity));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request, $entity), $interceptors);

        return $invocation->proceed();
    }

    public function toPdfAction($type, $status)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\PersonController', 'toPdfAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($type, $status));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($type, $status), $interceptors);

        return $invocation->proceed();
    }

    public function toExcelAction($status)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\PersonController', 'toExcelAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($status));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($status), $interceptors);

        return $invocation->proceed();
    }

    public function showAction(\Ben\LogementBundle\Entity\Person $entity)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\PersonController', 'showAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($entity));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($entity), $interceptors);

        return $invocation->proceed();
    }

    public function setStatusAction(\Symfony\Component\HttpFoundation\Request $request, $status)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\PersonController', 'setStatusAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request, $status));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request, $status), $interceptors);

        return $invocation->proceed();
    }

    public function removeSomeAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\PersonController', 'removeSomeAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request), $interceptors);

        return $invocation->proceed();
    }

    public function newAction($type)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\PersonController', 'newAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($type));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($type), $interceptors);

        return $invocation->proceed();
    }

    public function listElegibleAction()
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\PersonController', 'listElegibleAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function indexAction($status)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\PersonController', 'indexAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($status));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($status), $interceptors);

        return $invocation->proceed();
    }

    public function generateListAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\PersonController', 'generateListAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request), $interceptors);

        return $invocation->proceed();
    }

    public function editAction(\Ben\LogementBundle\Entity\Person $entity, $type)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\PersonController', 'editAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($entity, $type));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($entity, $type), $interceptors);

        return $invocation->proceed();
    }

    public function deleteAction(\Symfony\Component\HttpFoundation\Request $request, \Ben\LogementBundle\Entity\Person $entity)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\PersonController', 'deleteAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request, $entity));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request, $entity), $interceptors);

        return $invocation->proceed();
    }

    public function createAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\PersonController', 'createAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request), $interceptors);

        return $invocation->proceed();
    }

    public function clearOrdersAction()
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\PersonController', 'clearOrdersAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function cancelAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\PersonController', 'cancelAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request), $interceptors);

        return $invocation->proceed();
    }

    public function ajaxListAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $ref = new \ReflectionMethod('Ben\\LogementBundle\\Controller\\PersonController', 'ajaxListAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}