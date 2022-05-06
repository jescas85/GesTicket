<div class="main-sidebar sidebar-style-2">
	<aside id="sidebar-wrapper">
		<div class="sidebar-brand">
			<a href="<?=PATH?>home/">
				<img alt="image" src="<?=PATH?>views/public/img/logo.png" class="header-logo" />
				<span class="logo-name">GesTicket</span>
			</a>
		</div>
		<ul class="sidebar-menu">
			<li class="menu-header">Menú Principal</li>
			<li class="dropdown active">
				<a href="<?=PATH?>home/" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
			</li>
			<li class="dropdown">
				<a href="#" class="nav-link has-dropdown"><i class="fas fa-ticket-alt"></i><span>Tickets</span></a>
				<ul class="dropdown-menu">
					<li><a class="nav-link" href="<?=PATH?>ticket-new/">Crear Ticket</a></li>
					<li><a class="nav-link" href="<?=PATH?>ticket-list/">Consultar Ticket</a></li>
				</ul>
			</li>			
			<li><a class="nav-link" href="<?=PATH?>blank/"><i class="far fa-square"></i><span>Blank Page</span></a></li>
		</ul>
	</aside>
</div>