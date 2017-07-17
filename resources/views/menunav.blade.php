<nav class="navbar  navbar-default nav-menu">
    <?php
   $category= App\Category::all();
        ?>

    <div class="container">
        <ul class="nav  navbar-nav menu-ul">
            @foreach($category as $categories)
                <li><a href="{{route('categories',['name'=>$categories->category])}}">{{ ucfirst($categories->category)}}</a></li>
            @endforeach
        </ul>
    </div>
</nav>