 <!--
	====================================
	——— LEFT SIDEBAR WITH FOOTER
	=====================================
-->
<aside class="left-sidebar bg-sidebar">
	<div id="sidebar" class="sidebar sidebar-with-footer">
		<!-- Aplication Brand -->
		<div class="app-brand">
			<a href="{{ url('admin/dashboard') }}">
			<span class="brand-name">Alsav Dashboard</span>
			</a>
		</div>
		<!-- begin sidebar scrollbar -->
		<div class="sidebar-scrollbar">

			<!-- sidebar menu -->
			<ul class="nav sidebar-inner" id="sidebar-menu">
				<li  class="has-sub {{ ($currentAdminMenu == 'catalog') ? 'expand active' : ''}}" >
					<a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#dashboard"
						aria-expanded="false" aria-controls="dashboard">
						<i class="mdi mdi-view-dashboard-outline"></i>
						<span class="nav-text">Desktop Software</span> <b class="caret"></b>
					</a>
					<ul  class="collapse {{ ($currentAdminMenu == 'catalog') ? 'show' : ''}}"  id="dashboard"
						data-parent="#sidebar-menu">
						<div class="sub-menu">
							<li  class="{{ ($currentAdminSubMenu == 'product') ? 'active' : ''}}" >
								<a class="sidenav-item-link" href="{{ url('admin/desktop-software/industrial-class')}}">
								<span class="nav-text">Industrial Class</span>
								</a>
							</li>
							<li class="{{ ($currentAdminSubMenu == 'teacher') ? 'active' : ''}}">
								<a class="sidenav-item-link" href="{{ url('/admin/desktop-software/teacher')}}">
								<span class="nav-text">Teacher</span>
								</a>
							</li>
							
						</div>
					</ul>
				</li>
				<li  class="has-sub {{ ($currentAdminMenu == 'website') ? 'expand active' : ''}}" >
					<a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#traini"
						aria-expanded="false" aria-controls="traini">
						<i class="mdi mdi-email-mark-as-unread"></i>
						<span class="nav-text">Website</span> <b class="caret"></b>
					</a>
					<ul  class="collapse {{ ($currentAdminMenu == 'website') ? 'show' : ''}}"  id="traini"
						data-parent="#sidebar-menu">
						<div class="sub-menu">
							<li  class="{{ ($currentAdminSubMenu == 'website_meteri') ? 'active' : ''}}" >
								<a class="sidenav-item-link" href="{{ url('admin/website')}}">
								<span class="nav-text">Training Catalog</span>
								</a>
							</li>
						</div>
					</ul>
				</li>
				<li  class="has-sub {{ ($currentAdminMenu == 'mobile') ? 'expand active' : ''}}">
					<a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#recruit"
						aria-expanded="false" aria-controls="recruit">
						<i class="mdi mdi-folder-multiple-outline"></i>
						<span class="nav-text">Mobile App</span> <b class="caret"></b>
					</a>
					<ul class="collapse {{ ($currentAdminMenu == 'mobile') ? 'show' : ''}}"  id="recruit"
						data-parent="#sidebar-menu">
						<div class="sub-menu">
							<li  class="{{ ($currentAdminSubMenu == 'mobile_meteri') ? 'active' : ''}}" >
								<a class="sidenav-item-link" href="{{ url('admin/mobile')}}">
								<span class="nav-text">Materi</span>
								</a>
							</li>
						</div>
					</ul>
				</li>
				<li  class="has-sub {{ ($currentAdminMenu == 'ai_softwar') ? 'expand active' : ''}}">
					<a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#schol"
						aria-expanded="false" aria-controls="schol">
						<i class="mdi mdi-school"></i>
						<span class="nav-text">A.I Softwar</span> <b class="caret"></b>
					</a>
					<ul class="collapse {{ ($currentAdminMenu == 'ai_softwar') ? 'show' : ''}}"  id="schol"
						data-parent="#sidebar-menu">
						<div class="sub-menu">
							<li  class="{{ ($currentAdminSubMenu == 'ai_softwar_meteri') ? 'active' : ''}}" >
								<a class="sidenav-item-link" href="{{ url('admin/ai_softwar')}}">
								<span class="nav-text">Materi</span>
								</a>
							</li>
						</div>
					</ul>
				</li>
				<li  class="has-sub {{ ($currentAdminMenu == 'ui_ux') ? 'expand active' : ''}}">
					<a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#transaction"
						aria-expanded="false" aria-controls="transaction">
						<i class="mdi mdi-cart-outline"></i>
						<span class="nav-text">UI/UX with Figma</span> <b class="caret"></b>
					</a>
					<ul class="collapse {{ ($currentAdminMenu == 'ui_ux') ? 'show' : ''}}"  id="transaction"
						data-parent="#sidebar-menu">
						<div class="sub-menu">
							<li  class="{{ ($currentAdminSubMenu == 'ui_ux_meteri') ? 'active' : ''}}" >
								<a class="sidenav-item-link" href="{{ url('admin/ui_ux')}}">
								<span class="nav-text">Materi</span>
								</a>
							</li>
						</div>
					</ul>
				</li>  
				<li  class="has-sub {{ ($currentAdminMenu == 'codekidz') ? 'expand active' : ''}}">
					<a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#ticket"
						aria-expanded="false" aria-controls="ticket">
						<i class="mdi mdi-cart-plus"></i>
						<span class="nav-text">Codekidz</span> <b class="caret"></b>
					</a>
					<ul class="collapse {{ ($currentAdminMenu == 'codekidz') ? 'show' : ''}}"  id="ticket"
						data-parent="#sidebar-menu">
						<div class="sub-menu">
							<li  class="{{ ($currentAdminSubMenu == 'codekidz-materi') ? 'active' : ''}}" >
								<a class="sidenav-item-link" href="{{ url('admin/codekidz')}}">
								<span class="nav-text">Materi</span>
								</a>
							</li>
						</div>
					</ul>
				</li>
				<li  class="has-sub {{ ($currentAdminMenu == 'role-user') ? 'expand active' : ''}}" >
					<a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#auth"
						aria-expanded="false" aria-controls="dashboard">
						<i class="mdi mdi-account-multiple-outline"></i>
						<span class="nav-text">Users &amp; Roles</span> <b class="caret"></b>
					</a>
					<ul  class="collapse {{ ($currentAdminMenu == 'role-user') ? 'show' : ''}} "   id="auth"
						data-parent="#sidebar-menu">
						<div class="sub-menu">
							<li  class="{{ ($currentAdminSubMenu == 'user') ? 'active' : ''}}" >
								<a class="sidenav-item-link" href="{{ url('admin/users')}}">
								<span class="nav-text">Users</span>
								</a>
							</li>
							<!-- <li class="{{ ($currentAdminSubMenu == 'role') ? 'active' : ''}}">
								<a class="sidenav-item-link" href="{{ url('admin/roles')}}">
								<span class="nav-text">Roles</span>
								</a>
							</li> -->
						</div>
					</ul>
				</li>    
				
				            
			</ul>
		</div>
	</div>
</aside>