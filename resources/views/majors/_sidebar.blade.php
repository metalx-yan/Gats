<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar"   style="overflow-y: hidden;">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="images/logosekolah.png" class="img-responsive" alt="">
			</div>
		
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="index.html"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			{{-- <li><a href="widgets.html"><em class="fa fa-calendar">&nbsp;</em> Widgets</a></li> --}}
			{{-- <li><a href="charts.html"><em class="fa fa-bar-chart">&nbsp;</em> Charts</a></li> --}}
			{{-- <li><a href="elements.html"><em class="fa fa-toggle-off">&nbsp;</em> UI Elements</a></li> --}}
			{{-- <li><a href="panels.html"><em class="fa fa-clone">&nbsp;</em> Alerts &amp; Panels</a></li> --}}
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus" style="margin-top: 7px;"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 1
					</a></li>
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 2
					</a></li>
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 3
					</a></li>
				</ul>
			</li>
			<li>
			 <a class="dropdown-item" href="{{ route('logout') }}"
	            onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
				<em class="fa fa-power-off">&nbsp;</em> Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            </a></li>
		</ul>
	</div><!--/.sidebar-->
