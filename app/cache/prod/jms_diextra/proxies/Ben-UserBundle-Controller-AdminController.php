<?php

namespace EnhancedProxyc1729f3f_aaa968b903122828095fdfdbf82a8a9887fe7bb9\__CG__\Ben\UserBundle\Controller;

/**
 * CG library enhanced proxy class.
 *
 * This code was generated automatically by the CG library, manual changes to it
 * will be lost upon next generation.
 */
class AdminController extends \Ben\UserBundle\Controller\AdminController
{
    private $__CGInterception__loader;

    public function updateMeAction(\Symfony\Component\HttpFoundation\Request $request, \Ben\UserBundle\Entity\User $entity)
    {
        $ref = new \ReflectionMethod('Ben\\UserBundle\\Controller\\AdminController', 'updateMeAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request, $entity));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request, $entity), $interceptors);

        return $invocation->proceed();
    }

    public function updateAction(\Symfony\Component\HttpFoundation\Request $request, \Ben\UserBundle\Entity\User $user)
    {
        $ref = new \ReflectionMethod('Ben\\UserBundle\\Controller\\AdminController', 'updateAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request, $user));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request, $user), $interceptors);

        return $invocation->proceed();
    }

    public function showAction($id)
    {
        $ref = new \ReflectionMethod('Ben\\UserBundle\\Controller\\AdminController', 'showAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($id));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($id), $interceptors);

        return $invocation->proceed();
    }

    public function setRoleAction(\Symfony\Component\HttpFoundation\Request $request, $role)
    {
        $ref = new \ReflectionMethod('Ben\\UserBundle\\Controller\\AdminController', 'setRoleAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request, $role));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request, $role), $interceptors);

        return $invocation->proceed();
    }

    public function removeUsersAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $ref = new \ReflectionMethod('Ben\\UserBundle\\Controller\\AdminController', 'removeUsersAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request), $interceptors);

        return $invocation->proceed();
    }

    public function newAction()
    {
        $ref = new \ReflectionMethod('Ben\\UserBundle\\Controller\\AdminController', 'newAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function indexAction()
    {
        $ref = new \ReflectionMethod('Ben\\UserBundle\\Controller\\AdminController', 'indexAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function exportAction()
    {
        $ref = new \ReflectionMethod('Ben\\UserBundle\\Controller\\AdminController', 'exportAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function enableUsersAction(\Symfony\Component\HttpFoundation\Request $request, $etat)
    {
        $ref = new \ReflectionMethod('Ben\\UserBundle\\Controller\\AdminController', 'enableUsersAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request, $etat));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request, $etat), $interceptors);

        return $invocation->proceed();
    }

    public function editMeAction()
    {
        $ref = new \ReflectionMethod('Ben\\UserBundle\\Controller\\AdminController', 'editMeAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array());
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array(), $interceptors);

        return $invocation->proceed();
    }

    public function editAction(\Ben\UserBundle\Entity\User $entity)
    {
        $ref = new \ReflectionMethod('Ben\\UserBundle\\Controller\\AdminController', 'editAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($entity));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($entity), $interceptors);

        return $invocation->proceed();
    }

    public function deleteAction($user)
    {
        $ref = new \ReflectionMethod('Ben\\UserBundle\\Controller\\AdminController', 'deleteAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($user));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($user), $interceptors);

        return $invocation->proceed();
    }

    public function ajaxListAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $ref = new \ReflectionMethod('Ben\\UserBundle\\Controller\\AdminController', 'ajaxListAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request), $interceptors);

        return $invocation->proceed();
    }

    public function addAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $ref = new \ReflectionMethod('Ben\\UserBundle\\Controller\\AdminController', 'addAction');
        $interceptors = $this->__CGInterception__loader->loadInterceptors($ref, $this, array($request));
        $invocation = new \CG\Proxy\MethodInvocation($ref, $this, array($request), $interceptors);

        return $invocation->proceed();
    }

    public function __CGInterception__setLoader(\CG\Proxy\InterceptorLoaderInterface $loader)
    {
        $this->__CGInterception__loader = $loader;
    }
}