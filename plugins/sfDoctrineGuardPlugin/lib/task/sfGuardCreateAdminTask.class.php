<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Promote a user as a super administrator.
 *
 * @package    symfony
 * @subpackage task
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfGuardCreateAdminTask.class.php 23319 2009-10-25 12:22:23Z Kris.Wallsmith $
 */
class sfGuardPromoteSuperAdminTask extends sfBaseTask
{
  /**
   * @see sfTask
   */
  protected function configure()
  {
    $this->addArguments(array(
      new sfCommandArgument('username', sfCommandArgument::REQUIRED, 'The user name'),
    ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_OPTIONAL, 'The application name', null),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
    ));

    $this->namespace = 'guard';
    $this->name = 'promote';
    $this->briefDescription = 'Promotes a user as a super administrator';

    $this->detailedDescription = <<<EOF
The [guard:promote|INFO] task promotes a user as a super administrator:

  [./symfony guard:promote fabien|INFO]

The user must exist in the database.
EOF;
  }

  /**
   * @see sfTask
   */
  protected function execute($arguments = array(), $options = array())
  {
    $databaseManager = new sfDatabaseManager($this->configuration);

    $user = Doctrine::getTable('sfGuardUser')->findOneByUsername($arguments['username']);

    if (!$user)
    {
      throw new sfCommandException(sprintf('User "%s" does not exist.', $arguments['username']));
    }

    $user->setIsSuperAdmin(true);
    $user->save();

    $this->logSection('guard', sprintf('Promote user %s as a super administrator', $arguments['username']));
  }
}
