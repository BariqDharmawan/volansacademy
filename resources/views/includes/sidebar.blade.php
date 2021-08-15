<aside class="main-sidebar sidebar-dark-primary elevation-4">    
    <a href="/" class="brand-link">
        <img src="{{ asset('AdminLTE/dist/img/AdminLTELogo.png') }}" alt="Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Volans Education</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @if(auth()->user()->role_id == 1)
                <x-sidebar-link href="banners.index" text="Banner Utama" bootstrap-icon="fa-blog" />
                <x-sidebar-link href="classes.index" text="Program" bootstrap-icon="fa-university" />
                <x-sidebar-link href="cerita-alumni.index" text="Cerita Alumni" bootstrap-icon="fa-play" />
                <x-sidebar-link href="testimonial.index" text="Testimoni" bootstrap-icon="fa-quote-left" />
                <x-sidebar-link href="tutors.index" text="Tutor" bootstrap-icon="fa-chalkboard-teacher" />
                <x-sidebar-link href="advantages.index" text="Kenapa Volans" bootstrap-icon="fa-blog" />
                <x-sidebar-link href="newsletters.index" text="Newsletter" bootstrap-icon="fa-newspaper" />
                <x-sidebar-link href="blogs.index" text="Blog" 
                bootstrap-icon="fa-blog" />
                <x-sidebar-link href="roles.index" text="Roles" 
                bootstrap-icon="fa-user" />
                <x-sidebar-link href="users.index" text="Users" 
                bootstrap-icon="fa-users" />
                <x-sidebar-link href="our-contact.index" text="Our contact" bootstrap-icon="fa-users" />
                @else
                <x-sidebar-link href="courses" text="Program" bootstrap-icon="fa-university" />
                @endif
            </ul>
        </nav>
    </div>
</aside>
