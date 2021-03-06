<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
</head>
<body>
    <ul>
        <li><?php echo link_to('Dashboard', '@homepage') ?></li>
        <li><?php echo link_to('Project', '@vp_project') ?></li>
        <li><?php echo link_to('Userstory', '@vp_userstory') ?></li>
        <li><?php echo link_to('Task', '@vp_task') ?></li>
        <li><?php echo link_to('Usuarios', '@sf_guard_user') ?></li>
        <li><?php echo link_to('Grupos', 'sfGuardGroup/index') ?></li>
        <li><?php echo link_to('Permisos', 'sfGuardPermission/index') ?></li>
    </ul>

    <?php echo $sf_content ?>
    <?php include_javascripts() ?>
</body>
</html>