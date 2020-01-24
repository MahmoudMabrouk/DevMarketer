<div class="side-menu" id="admin-side-menu">
    <aside class="menu m-t-30 m-l-10" >
        <p class="menu-label">
            General
        </p>
        <ul class="menu-list">
            <li><a  href="{{route('manage.dashboard')}}" class="{{ Nav::isRoute('manage.dashboard') }}"> Dashboard</a></li>
        </ul>
        <p class="menu-label">
            Content
        </p>
        <ul class="menu-list">
            <li>
                <a  href="{{route('post.index')}}" class="{{ Nav::isResource('post') }}">Blog Posts</a>
            </li>
            
        </ul>
        <p class="menu-label">
            Administration
        </p>
        <ul class="menu-list">
            <li>
                <a  href="{{route('users.index')}}" class="{{ Nav::isResource('users') }}">Manage Users</a>
            </li>
            <li>
                <a class="has-submenu {{ Nav::hasSegment(['role', 'permission'], 2) }}" >Roles &amp; Permissions</a>
                <ul class="submenu">
                    <li><a  href="{{route('permission.index')}}" class="{{ Nav::isResource('permission') }}">Permissions</a></li>
                    <li><a  href="{{route('role.index')}}" class="{{ Nav::isResource('role') }}">Roles</a></li>
                </ul>
            </li>
        </ul>
    </aside>

</div>