<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/')) {
            // ben_dashboard
            if (rtrim($pathinfo, '/') === '') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'ben_dashboard');
                }

                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\DefaultController::indexAction',  '_route' => 'ben_dashboard',);
            }

            // ben_import
            if ($pathinfo === '/import') {
                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\DefaultController::importAction',  '_route' => 'ben_import',);
            }

        }

        if (0 === strpos($pathinfo, '/etudiant')) {
            // etudiant
            if (0 === strpos($pathinfo, '/etudiant/etat') && preg_match('#^/etudiant/etat(?:_(?P<status>[^_]+))?$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\PersonController::indexAction',  'status' => 'all',)), array('_route' => 'etudiant'));
            }

            // etudiant_elegible
            if ($pathinfo === '/etudiant/elegible') {
                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\PersonController::listElegibleAction',  '_route' => 'etudiant_elegible',);
            }

            // etudiant_ajax
            if ($pathinfo === '/etudiant/etudiants-list') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_etudiant_ajax;
                }

                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\PersonController::ajaxListAction',  '_route' => 'etudiant_ajax',);
            }
            not_etudiant_ajax:

            // etudiant_show
            if (preg_match('#^/etudiant/(?P<id>[^/]+)/show$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\PersonController::showAction',)), array('_route' => 'etudiant_show'));
            }

            // etudiant_new
            if (0 === strpos($pathinfo, '/etudiant/new') && preg_match('#^/etudiant/new(?:/(?P<type>[^/]+))?$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\PersonController::newAction',  'type' => 'nouveau',)), array('_route' => 'etudiant_new'));
            }

            // etudiant_create
            if ($pathinfo === '/etudiant/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_etudiant_create;
                }

                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\PersonController::createAction',  '_route' => 'etudiant_create',);
            }
            not_etudiant_create:

            // etudiant_edit
            if (preg_match('#^/etudiant/(?P<id>[^/]+)/edit/(?P<type>[^/]+)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\PersonController::editAction',)), array('_route' => 'etudiant_edit'));
            }

            // etudiant_update
            if (preg_match('#^/etudiant/(?P<id>[^/]+)/update$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_etudiant_update;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\PersonController::updateAction',)), array('_route' => 'etudiant_update'));
            }
            not_etudiant_update:

            // etudiant_delete
            if (preg_match('#^/etudiant/(?P<id>[^/]+)/delete$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_etudiant_delete;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\PersonController::deleteAction',)), array('_route' => 'etudiant_delete'));
            }
            not_etudiant_delete:

            // etudiant_remove_some
            if ($pathinfo === '/etudiant/removeSome') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_etudiant_remove_some;
                }

                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\PersonController::removeSomeAction',  '_route' => 'etudiant_remove_some',);
            }
            not_etudiant_remove_some:

            // etudiant_status
            if (0 === strpos($pathinfo, '/etudiant/status') && preg_match('#^/etudiant/status/(?P<status>[^/]+)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_etudiant_status;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\PersonController::setStatusAction',)), array('_route' => 'etudiant_status'));
            }
            not_etudiant_status:

            // etudiant_cancel
            if ($pathinfo === '/etudiant/cancel') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_etudiant_cancel;
                }

                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\PersonController::cancelAction',  '_route' => 'etudiant_cancel',);
            }
            not_etudiant_cancel:

            // etudiant_generate_list
            if ($pathinfo === '/etudiant/generate/list') {
                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\PersonController::generateListAction',  '_route' => 'etudiant_generate_list',);
            }

            // etudiant_validate_list
            if ($pathinfo === '/etudiant/generate/list/valide') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_etudiant_validate_list;
                }

                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\PersonController::validateListAction',  '_route' => 'etudiant_validate_list',);
            }
            not_etudiant_validate_list:

            // etudiant_to_excel
            if (0 === strpos($pathinfo, '/etudiant/export/excel') && preg_match('#^/etudiant/export/excel(?:/(?P<status>[^/]+))?$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\PersonController::toExcelAction',  'status' => 'all',)), array('_route' => 'etudiant_to_excel'));
            }

            // etudiant_to_pdf
            if (0 === strpos($pathinfo, '/etudiant/pdf') && preg_match('#^/etudiant/pdf(?:/(?P<type>[^/\\-]+)(?:\\-(?P<status>[^\\-]+))?)?$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\PersonController::toPdfAction',  'type' => 'all',  'status' => 'all',)), array('_route' => 'etudiant_to_pdf'));
            }

            // etudiant_prepare_pdf
            if ($pathinfo === '/etudiant/prepare/pdf') {
                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\PersonController::prepareToPdfAction',  '_route' => 'etudiant_prepare_pdf',);
            }

            // order_clear
            if ($pathinfo === '/etudiant/orders/clear') {
                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\PersonController::clearOrdersAction',  '_route' => 'order_clear',);
            }

        }

        if (0 === strpos($pathinfo, '/room')) {
            // room
            if (rtrim($pathinfo, '/') === '/room') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'room');
                }

                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\RoomController::indexAction',  '_route' => 'room',);
            }

            // room_ajax
            if ($pathinfo === '/room/ajaxlist') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_room_ajax;
                }

                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\RoomController::ajaxListAction',  '_route' => 'room_ajax',);
            }
            not_room_ajax:

            // room_show
            if (preg_match('#^/room/(?P<id>[^/]+)/show$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\RoomController::showAction',)), array('_route' => 'room_show'));
            }

            // room_free_list
            if (0 === strpos($pathinfo, '/room/freeRooms') && preg_match('#^/room/freeRooms/(?P<id>[^/]+)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\RoomController::freeRoomsAction',)), array('_route' => 'room_free_list'));
            }

            // room_new
            if ($pathinfo === '/room/new') {
                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\RoomController::newAction',  '_route' => 'room_new',);
            }

            // room_create
            if ($pathinfo === '/room/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_room_create;
                }

                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\RoomController::createAction',  '_route' => 'room_create',);
            }
            not_room_create:

            // room_new_multiple
            if ($pathinfo === '/room/new_multiple') {
                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\RoomController::newMultipleAction',  '_route' => 'room_new_multiple',);
            }

            // room_create_multiple
            if ($pathinfo === '/room/room_create_multiple') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_room_create_multiple;
                }

                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\RoomController::createMultipleAction',  '_route' => 'room_create_multiple',);
            }
            not_room_create_multiple:

            // room_edit
            if (preg_match('#^/room/(?P<id>[^/]+)/edit$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\RoomController::editAction',)), array('_route' => 'room_edit'));
            }

            // room_update
            if (preg_match('#^/room/(?P<id>[^/]+)/update$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_room_update;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\RoomController::updateAction',)), array('_route' => 'room_update'));
            }
            not_room_update:

            // room_delete
            if (preg_match('#^/room/(?P<id>[^/]+)/delete$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_room_delete;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\RoomController::deleteAction',)), array('_route' => 'room_delete'));
            }
            not_room_delete:

            // room_switch
            if ($pathinfo === '/room/switch') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_room_switch;
                }

                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\RoomController::switchAction',  '_route' => 'room_switch',);
            }
            not_room_switch:

            // room_set_free
            if (preg_match('#^/room/(?P<id>[^/]+)/setFree$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\RoomController::setFreeAction',)), array('_route' => 'room_set_free'));
            }

            // room_to_excel
            if ($pathinfo === '/room/export/excel') {
                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\RoomController::toExcelAction',  '_route' => 'room_to_excel',);
            }

        }

        if (0 === strpos($pathinfo, '/block')) {
            // block
            if (rtrim($pathinfo, '/') === '/block') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'block');
                }

                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\BlockController::indexAction',  '_route' => 'block',);
            }

            // block_show
            if (preg_match('#^/block/(?P<id>[^/]+)/show$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\BlockController::showAction',)), array('_route' => 'block_show'));
            }

            // block_new
            if ($pathinfo === '/block/new') {
                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\BlockController::newAction',  '_route' => 'block_new',);
            }

            // block_create
            if ($pathinfo === '/block/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_block_create;
                }

                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\BlockController::createAction',  '_route' => 'block_create',);
            }
            not_block_create:

            // block_edit
            if (preg_match('#^/block/(?P<id>[^/]+)/edit$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\BlockController::editAction',)), array('_route' => 'block_edit'));
            }

            // block_update
            if (preg_match('#^/block/(?P<id>[^/]+)/update$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_block_update;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\BlockController::updateAction',)), array('_route' => 'block_update'));
            }
            not_block_update:

            // block_delete
            if (preg_match('#^/block/(?P<id>[^/]+)/delete$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_block_delete;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\BlockController::deleteAction',)), array('_route' => 'block_delete'));
            }
            not_block_delete:

        }

        if (0 === strpos($pathinfo, '/logement')) {
            // logement
            if (rtrim($pathinfo, '/') === '/logement') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'logement');
                }

                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\LogementController::indexAction',  '_route' => 'logement',);
            }

            // logement_show
            if (preg_match('#^/logement/(?P<id>[^/]+)/show$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\LogementController::showAction',)), array('_route' => 'logement_show'));
            }

            // logement_new
            if ($pathinfo === '/logement/new') {
                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\LogementController::newAction',  '_route' => 'logement_new',);
            }

            // logement_create
            if ($pathinfo === '/logement/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_logement_create;
                }

                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\LogementController::createAction',  '_route' => 'logement_create',);
            }
            not_logement_create:

            // logement_edit
            if (preg_match('#^/logement/(?P<id>[^/]+)/edit$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\LogementController::editAction',)), array('_route' => 'logement_edit'));
            }

            // logement_update
            if (preg_match('#^/logement/(?P<id>[^/]+)/update$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_logement_update;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\LogementController::updateAction',)), array('_route' => 'logement_update'));
            }
            not_logement_update:

            // logement_delete
            if (preg_match('#^/logement/(?P<id>[^/]+)/delete$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_logement_delete;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\LogementController::deleteAction',)), array('_route' => 'logement_delete'));
            }
            not_logement_delete:

        }

        if (0 === strpos($pathinfo, '/reservation')) {
            // reservation
            if (0 === strpos($pathinfo, '/reservation/page') && preg_match('#^/reservation/page(?:/(?P<page>[^/\\-]+)(?:\\-(?P<perPage>[^\\-/]+)(?:/(?P<status>[^/]+))?)?)?$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\ReservationController::indexAction',  'page' => '1',  'perPage' => '20',  'status' => 'all',)), array('_route' => 'reservation'));
            }

            // reservation_show
            if (preg_match('#^/reservation/(?P<id>[^/]+)/show$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\ReservationController::showAction',)), array('_route' => 'reservation_show'));
            }

            // reservation_new
            if (0 === strpos($pathinfo, '/reservation/new') && preg_match('#^/reservation/new/(?P<id>[^/]+)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\ReservationController::newAction',)), array('_route' => 'reservation_new'));
            }

            // reservation_create
            if ($pathinfo === '/reservation/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_reservation_create;
                }

                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\ReservationController::createAction',  '_route' => 'reservation_create',);
            }
            not_reservation_create:

            // reservation_edit
            if (preg_match('#^/reservation/(?P<id>[^/]+)/edit$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\ReservationController::editAction',)), array('_route' => 'reservation_edit'));
            }

            // reservation_update
            if (preg_match('#^/reservation/(?P<id>[^/]+)/update$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_reservation_update;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\ReservationController::updateAction',)), array('_route' => 'reservation_update'));
            }
            not_reservation_update:

            // reservation_delete
            if (preg_match('#^/reservation/(?P<id>[^/]+)/delete$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_reservation_delete;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\ReservationController::deleteAction',)), array('_route' => 'reservation_delete'));
            }
            not_reservation_delete:

            // reservation_status
            if (0 === strpos($pathinfo, '/reservation/status') && preg_match('#^/reservation/status/(?P<id>[^/\\-]+)\\-(?P<status>[^\\-]+)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\ReservationController::setStatusAction',)), array('_route' => 'reservation_status'));
            }

        }

        if (0 === strpos($pathinfo, '/university')) {
            // university
            if (0 === strpos($pathinfo, '/university/u') && preg_match('#^/university/u(?:/(?P<type>[^/]+))?$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\UniversityController::indexAction',  'type' => 'university',)), array('_route' => 'university'));
            }

            // etablissement
            if (0 === strpos($pathinfo, '/university/e') && preg_match('#^/university/e(?:/(?P<type>[^/]+))?$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\UniversityController::indexAction',  'type' => 'etablissement',)), array('_route' => 'etablissement'));
            }

            // university_show
            if (preg_match('#^/university/(?P<id>[^/]+)/show$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\UniversityController::showAction',)), array('_route' => 'university_show'));
            }

            // university_json
            if (0 === strpos($pathinfo, '/university/json') && preg_match('#^/university/json/(?P<id>[^/]+)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\UniversityController::jsonListAction',)), array('_route' => 'university_json'));
            }

            // university_new
            if (0 === strpos($pathinfo, '/university/new') && preg_match('#^/university/new(?:/(?P<type>[^/]+))?$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\UniversityController::newAction',  'type' => 'university',)), array('_route' => 'university_new'));
            }

            // university_create
            if (0 === strpos($pathinfo, '/university/create') && preg_match('#^/university/create(?:/(?P<type>[^/]+))?$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_university_create;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\UniversityController::createAction',  'type' => 'university',)), array('_route' => 'university_create'));
            }
            not_university_create:

            // university_edit
            if (preg_match('#^/university/(?P<id>[^/]+)/edit$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\UniversityController::editAction',)), array('_route' => 'university_edit'));
            }

            // university_update
            if (preg_match('#^/university/(?P<id>[^/]+)/update$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_university_update;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\UniversityController::updateAction',)), array('_route' => 'university_update'));
            }
            not_university_update:

            // university_delete
            if (preg_match('#^/university/(?P<id>[^/]+)/delete$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_university_delete;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\UniversityController::deleteAction',)), array('_route' => 'university_delete'));
            }
            not_university_delete:

            // university_to_excel
            if (0 === strpos($pathinfo, '/university/excel') && preg_match('#^/university/excel(?:/(?P<type>[^/]+))?$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\UniversityController::toExcelAction',  'type' => 'university',)), array('_route' => 'university_to_excel'));
            }

        }

        if (0 === strpos($pathinfo, '/config')) {
            // config
            if (rtrim($pathinfo, '/') === '/config') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'config');
                }

                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\ConfigController::indexAction',  '_route' => 'config',);
            }

            // config_show
            if (preg_match('#^/config/(?P<id>[^/]+)/show$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\ConfigController::showAction',)), array('_route' => 'config_show'));
            }

            // config_new
            if ($pathinfo === '/config/new') {
                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\ConfigController::newAction',  '_route' => 'config_new',);
            }

            // config_create
            if ($pathinfo === '/config/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_config_create;
                }

                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\ConfigController::createAction',  '_route' => 'config_create',);
            }
            not_config_create:

            // config_edit
            if (preg_match('#^/config/(?P<id>[^/]+)/edit$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\ConfigController::editAction',)), array('_route' => 'config_edit'));
            }

            // config_update
            if ($pathinfo === '/config/update') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_config_update;
                }

                return array (  '_controller' => 'Ben\\LogementBundle\\Controller\\ConfigController::updateAction',  '_route' => 'config_update',);
            }
            not_config_update:

            // config_delete
            if (preg_match('#^/config/(?P<id>[^/]+)/delete$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_config_delete;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\LogementBundle\\Controller\\ConfigController::deleteAction',)), array('_route' => 'config_delete'));
            }
            not_config_delete:

        }

        if (0 === strpos($pathinfo, '/')) {
            // fos_user_security_login
            if ($pathinfo === '/login') {
                return array (  '_controller' => 'Ben\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
            }

            // fos_user_security_check
            if ($pathinfo === '/login_check') {
                return array (  '_controller' => 'Ben\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'Ben\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }

            if (0 === strpos($pathinfo, '/profile')) {
                // fos_user_profile_show
                if (rtrim($pathinfo, '/') === '/profile') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_profile_show;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                    }

                    return array (  '_controller' => 'Ben\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
                }
                not_fos_user_profile_show:

                // fos_user_profile_edit
                if ($pathinfo === '/profile/edit') {
                    return array (  '_controller' => 'Ben\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
                }

            }

            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/register') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'Ben\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }

                // fos_user_registration_check_email
                if ($pathinfo === '/register/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_registration_check_email;
                    }

                    return array (  '_controller' => 'Ben\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                }
                not_fos_user_registration_check_email:

                // fos_user_registration_confirm
                if (0 === strpos($pathinfo, '/register/confirm') && preg_match('#^/register/confirm/(?P<token>[^/]+)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_registration_confirm;
                    }

                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\UserBundle\\Controller\\RegistrationController::confirmAction',)), array('_route' => 'fos_user_registration_confirm'));
                }
                not_fos_user_registration_confirm:

                // fos_user_registration_confirmed
                if ($pathinfo === '/register/confirmed') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_registration_confirmed;
                    }

                    return array (  '_controller' => 'Ben\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                }
                not_fos_user_registration_confirmed:

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'Ben\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'Ben\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'Ben\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]+)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\UserBundle\\Controller\\ResettingController::resetAction',)), array('_route' => 'fos_user_resetting_reset'));
                }
                not_fos_user_resetting_reset:

            }

            // fos_user_change_password
            if ($pathinfo === '/change-password/change-password') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_change_password;
                }

                return array (  '_controller' => 'Ben\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
            }
            not_fos_user_change_password:

            // fos_autocomplete
            if ($pathinfo === '/users/autocomplete') {
                return array (  '_controller' => 'Ben\\UserBundle\\Controller\\UserController::autocompleteAction',  '_route' => 'fos_autocomplete',);
            }

            if (0 === strpos($pathinfo, '/group')) {
                // fos_user_group_list
                if ($pathinfo === '/group/list') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_group_list;
                    }

                    return array (  '_controller' => 'Ben\\UserBundle\\Controller\\GroupController::listAction',  '_route' => 'fos_user_group_list',);
                }
                not_fos_user_group_list:

                // fos_user_group_new
                if ($pathinfo === '/group/new') {
                    return array (  '_controller' => 'Ben\\UserBundle\\Controller\\GroupController::newAction',  '_route' => 'fos_user_group_new',);
                }

                // fos_user_group_show
                if (preg_match('#^/group/(?P<groupname>[^/]+)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_group_show;
                    }

                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\UserBundle\\Controller\\GroupController::showAction',)), array('_route' => 'fos_user_group_show'));
                }
                not_fos_user_group_show:

                // fos_user_group_edit
                if (preg_match('#^/group/(?P<groupname>[^/]+)/edit$#s', $pathinfo, $matches)) {
                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\UserBundle\\Controller\\GroupController::editAction',)), array('_route' => 'fos_user_group_edit'));
                }

                // fos_user_group_delete
                if (preg_match('#^/group/(?P<groupname>[^/]+)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_group_delete;
                    }

                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\UserBundle\\Controller\\GroupController::deleteAction',)), array('_route' => 'fos_user_group_delete'));
                }
                not_fos_user_group_delete:

            }

            if (0 === strpos($pathinfo, '/manage')) {
                // ben_users
                if (rtrim($pathinfo, '/') === '/manage') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'ben_users');
                    }

                    return array (  '_controller' => 'Ben\\UserBundle\\Controller\\AdminController::indexAction',  '_route' => 'ben_users',);
                }

                // ben_users_ajax
                if ($pathinfo === '/manage/userslist') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_ben_users_ajax;
                    }

                    return array (  '_controller' => 'Ben\\UserBundle\\Controller\\AdminController::ajaxListAction',  '_route' => 'ben_users_ajax',);
                }
                not_ben_users_ajax:

                // ben_show_user
                if (0 === strpos($pathinfo, '/manage/show') && preg_match('#^/manage/show/(?P<id>[^/]+)$#s', $pathinfo, $matches)) {
                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\UserBundle\\Controller\\AdminController::showAction',)), array('_route' => 'ben_show_user'));
                }

                // ben_new_user
                if ($pathinfo === '/manage/new') {
                    return array (  '_controller' => 'Ben\\UserBundle\\Controller\\AdminController::newAction',  '_route' => 'ben_new_user',);
                }

                // ben_add_user
                if ($pathinfo === '/manage/add') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_ben_add_user;
                    }

                    return array (  '_controller' => 'Ben\\UserBundle\\Controller\\AdminController::addAction',  '_route' => 'ben_add_user',);
                }
                not_ben_add_user:

                // ben_edit_user
                if (0 === strpos($pathinfo, '/manage/edit') && preg_match('#^/manage/edit/(?P<id>[^/]+)$#s', $pathinfo, $matches)) {
                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\UserBundle\\Controller\\AdminController::editAction',)), array('_route' => 'ben_edit_user'));
                }

                // ben_update_user
                if (0 === strpos($pathinfo, '/manage/update') && preg_match('#^/manage/update/(?P<id>[^/]+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_ben_update_user;
                    }

                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\UserBundle\\Controller\\AdminController::updateAction',)), array('_route' => 'ben_update_user'));
                }
                not_ben_update_user:

                // ben_users_list
                if ($pathinfo === '/manage/users/list') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_ben_users_list;
                    }

                    return array (  '_controller' => 'Ben\\UserBundle\\Controller\\AdminController::usersListAction',  '_route' => 'ben_users_list',);
                }
                not_ben_users_list:

                // ben_enable_users
                if (0 === strpos($pathinfo, '/manage/users/active') && preg_match('#^/manage/users/active(?:/(?P<etat>[^/]+))?$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_ben_enable_users;
                    }

                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\UserBundle\\Controller\\AdminController::enableUsersAction',  'etat' => '1',)), array('_route' => 'ben_enable_users'));
                }
                not_ben_enable_users:

                // ben_promote_users
                if (0 === strpos($pathinfo, '/manage/promote') && preg_match('#^/manage/promote(?:/(?P<role>[^/]+))?$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_ben_promote_users;
                    }

                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\UserBundle\\Controller\\AdminController::setRoleAction',  'role' => 'user',)), array('_route' => 'ben_promote_users'));
                }
                not_ben_promote_users:

                // ben_delete_user
                if (0 === strpos($pathinfo, '/manage/delete') && preg_match('#^/manage/delete/(?P<id>[^/]+)$#s', $pathinfo, $matches)) {
                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\UserBundle\\Controller\\AdminController::deleteAction',)), array('_route' => 'ben_delete_user'));
                }

                // ben_remove_users
                if ($pathinfo === '/manage/delete') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_ben_remove_users;
                    }

                    return array (  '_controller' => 'Ben\\UserBundle\\Controller\\AdminController::removeUsersAction',  '_route' => 'ben_remove_users',);
                }
                not_ben_remove_users:

                // ben_users_export
                if ($pathinfo === '/manage/export') {
                    return array (  '_controller' => 'Ben\\UserBundle\\Controller\\AdminController::exportAction',  '_route' => 'ben_users_export',);
                }

                // ben_profile_edit
                if (0 === strpos($pathinfo, '/manage/me/edit') && preg_match('#^/manage/me/edit/(?P<name>[^/]+)$#s', $pathinfo, $matches)) {
                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\UserBundle\\Controller\\AdminController::editMeAction',)), array('_route' => 'ben_profile_edit'));
                }

                // ben_profile_update
                if (0 === strpos($pathinfo, '/manage/_me') && preg_match('#^/manage/_me/(?P<id>[^/]+)/update$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_ben_profile_update;
                    }

                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\UserBundle\\Controller\\AdminController::updateMeAction',)), array('_route' => 'ben_profile_update'));
                }
                not_ben_profile_update:

                // ben_pdf
                if (0 === strpos($pathinfo, '/manage/pdf') && preg_match('#^/manage/pdf/(?P<users>[^/]+)$#s', $pathinfo, $matches)) {
                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\UserBundle\\Controller\\AdminController::pdfAction',)), array('_route' => 'ben_pdf'));
                }

                // ben_badge_user
                if (0 === strpos($pathinfo, '/manage/badge') && preg_match('#^/manage/badge/(?P<users>[^/]+)$#s', $pathinfo, $matches)) {
                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Ben\\UserBundle\\Controller\\AdminController::showBadgeAction',)), array('_route' => 'ben_badge_user'));
                }

            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
