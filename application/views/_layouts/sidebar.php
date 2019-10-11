<?php 

$nav = array(
          array('href' => base_url().'dashboard/', 'fa' => 'dashboard', 'label' => 'Dashboard' ), 
          array('href' => base_url().'patients/', 'fa' => 'user', 'label' => 'Patients' ),
          array('href' => base_url().'queueing/', 'fa' => 'fast-forward', 'label' => 'Queueing' ),
          array('href' => base_url().'schedule', 'fa' => 'calendar', 'label' => 'Schedule' ),
          array('href' => base_url().'payment/', 'fa' => 'credit-card', 'label' => 'Payment' ),
          array('href' => base_url().'inventory/', 'fa' => 'cubes', 'label' => 'Inventory' ),
          array('href' => base_url().'reports/', 'fa' => 'line-chart', 'label' => 'Reports' ),
          array('href' => base_url().'accounts/', 'fa' => 'users', 'label' => 'Accounts' ),
          array('href' => base_url().'logs/', 'fa' => 'history', 'label' => 'Logs' ),
          array('href' => base_url().'setup/', 'fa' => 'cogs', 'label' => 'Setup', 'links' => array() )
);

?>

<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar" style="height:auto;">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assets'); ?>/img/user.png" style="width: 45px;" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Menu</li>
      
      <?php foreach ($nav as $key => $value): ?>
      <li class="<?= ($this->uri->segment(1) == strtolower($value['label'])) ? 'active' : ''; ?>">
        <a href="<?= $value['href']; ?>">
          <i class="fa fa-<?= $value['fa']; ?>"></i> <span><?= $value['label']; ?></span>
        </a>
      </li>
      <?php endforeach; ?>
    </ul> 
  </section>
  <!-- /.sidebar -->
</aside>