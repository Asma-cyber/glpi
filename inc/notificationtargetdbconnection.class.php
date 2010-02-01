<?php
/*
 * @version $Id: notification.class.php 10030 2010-01-05 11:11:22Z moyo $
 -------------------------------------------------------------------------
 GLPI - Gestionnaire Libre de Parc Informatique
 Copyright (C) 2003-2009 by the INDEPNET Development Team.

 http://indepnet.net/   http://glpi-project.org
 -------------------------------------------------------------------------

 LICENSE

 This file is part of GLPI.

 GLPI is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 GLPI is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with GLPI; if not, write to the Free Software
 Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 --------------------------------------------------------------------------
 */

if (!defined('GLPI_ROOT')){
   die("Sorry. You can't access directly to this file");
}

// Class NotificationTarget
class NotificationTargetDBConnection extends NotificationTarget {

   //Overwrite the function in NotificationTarget because there's only one target to be notified
   function getNotficationTargets($entity) {
      global $LANG;
      $profiles[NOTIFICATION_USER_TYPE . "_" . NOTIFICATION_GLOBAL_ADMINISTRATOR] = $LANG['setup'][237];
      return $profiles;
   }

   function getEvents() {
      global $LANG;
      return array ('desynchronization' => $LANG['setup'][810]);
   }

   function getDatasForTemplate($event) {
      global $LANG;

      $tpldatas = array();
      $tpldatas['dbconnection.description'] = $LANG['setup'][808];
      $tpldatas['lang.dbconnection.delay'] = $LANG['setup'][807];
      $tpldatas['dbconnection.delay'] = DBConnection::getReplicateDelay();
      return $tpldatas;
   }
}
?>