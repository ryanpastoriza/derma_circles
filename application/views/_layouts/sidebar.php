<?php 

$nav = array(
          array('href' => base_url().'dashboard/', 'fa' => 'dashboard', 'label' => 'Dashboard' ), 
          array('href' => base_url().'patients/', 'fa' => 'user', 'label' => 'Patients' ),
          array('href' => base_url().'queueing/', 'fa' => 'fast-forward', 'label' => 'Queueing' ),
          array('href' => base_url().'schedule', 'fa' => 'calendar', 'label' => 'Schedule' ),
          array('href' => base_url().'services/main', 'fa' => 'industry', 'label' => 'Services', 'links' => array(
            ['label' => 'Therapist', 'fa' => 'hand-stop-o', 'href' => base_url('services/therapist'), 'uri' => 'therapist'],
            ['label' => 'Service Management', 'fa' => 'shopping-bag', 'href' => base_url('services/service_management'), 'uri' => 'service_management'],
            // ['label' => 'Machines', 'fa' => 'plug', 'href' => base_url('test'), 'uri' => 'machines']
            ) ),
          array('href' => base_url().'payment/', 'fa' => 'credit-card', 'label' => 'Payment' ),
          array('href' => base_url().'inventory/', 'fa' => 'cubes', 'label' => 'Inventory', 'links' => array(
            ['label' => 'Products', 'fa' => 'product-hunt', 'href' => base_url('inventory/products'), 'uri' => 'products'],
            ['label' => 'Stocks', 'fa' => 'th-list', 'href' => base_url('inventory/stocks'), 'uri' => 'stocks'],
            ['label' => 'Stock Transfer', 'fa' => 'truck', 'href' => base_url('inventory/stock_transfer'), 'uri' => 'stock_transfer'],
            ['label' => 'POS', 'fa' => 'shopping-cart', 'href' => base_url(), 'uri' => 'pos']

          ) ),
          array('href' => base_url().'reports/', 'fa' => 'line-chart', 'label' => 'Reports' ),
          array('href' => base_url().'accounts/', 'fa' => 'users', 'label' => 'Accounts' ),
          array('href' => base_url().'logs/', 'fa' => 'history', 'label' => 'Logs' ),
          array('fa' => 'cogs', 'label' => 'Setup', 'links' => array(
            ['label' => 'Roles and Accessibilities', 'uri' => 'roles', 'href' => base_url('setup/roles'), 'fa' => 'user-circle'],
            ['label' => 'Services', 'uri' => 'services', 'href' => base_url('setup/services'), 'fa' => 'handshake-o'],
            ['label' => 'Branches', 'uri' => 'branches', 'href' => base_url('setup/branches'), 'fa' => 'building-o']
          ) )
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
        <p><?= ucwords($this->session->userdata['username']); ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Menu</li>
      <?php foreach ($nav as $key => $value): ?>
        <?php if (empty($value['links'])): ?>
          <li class="<?= ($this->uri->segment(1) == strtolower($value['label'])) ? 'active' : ''; ?>">
            <a href="<?= $value['href']; ?>">
              <i class="fa fa-<?= $value['fa']; ?>"></i> <span><?= $value['label']; ?></span>
            </a>
          </li>
        <?php else: ?>

          <li class="treeview <?= ($this->uri->segment(1) == strtolower($value['label'])) ? 'active' : '5test'; ?>">
            <a href="#"><i class="fa fa-<?= $value['fa']; ?>"></i> <span><?= $value['label'] ?></span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php foreach ($value['links'] as $key1 => $value1): ?>
                <li class="<?= ($this->uri->segment(2) == strtolower($value1['uri'])) ? 'active' : ''; ?>">
                  <a href="<?= $value1['href']?>">
                    <i class="fa fa-<?=$value1['fa'] ?>"></i><span><?= $value1['label'] ?></span>
                  </a>
                </li>
              <?php endforeach ?>
            </ul>
          </li>

        <?php endif ?>
      <?php endforeach; ?>
    </ul> 
  </section>
  <!-- /.sidebar -->
</aside>

