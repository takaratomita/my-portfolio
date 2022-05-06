<div class="breadcrumb">
    <ol itemscope itemtype="https://schema.org/BreadcrumbList">
        @if ( trim($body_class) === 'works' || trim($body_class) === 'works-detail' )
        <li itemprop="itemListElement" itemscope
            itemtype="https://schema.org/ListItem">
        <a class="shadow-txt hov hov-txt" itemprop="item" href="/">
            <span itemprop="name">Home</span>
        </a>
        <i class="fa-solid fa-angle-right"></i>
        <meta itemprop="position" content="1" />
        </li>
        <li itemprop="itemListElement" itemscope
        itemtype="https://schema.org/ListItem">
        @if ( isset($breadcrumb) )
        <a class="shadow-txt hov hov-txt" itemprop="item" href="{{ route('work') }}">
            <span itemprop="name">Works</span>
        </a>
        <i class='fa-solid fa-angle-right'></i>
        @else
        <span itemprop="name">Works</span>
        @endif
        <meta itemprop="position" content="2" />
        </li>
        @if ( isset($breadcrumb) )
        <li itemprop="itemListElement" itemscope
            itemtype="https://schema.org/ListItem">
            <span itemprop="name">{{ $breadcrumb }}</span>
        <meta itemprop="position" content="3" />
        </li>
        @endif

        @elseif ( trim($body_class) === 'blogs' || trim($body_class) === 'blogs-detail' )
        <li itemprop="itemListElement" itemscope
            itemtype="https://schema.org/ListItem">
        <a class="shadow-txt hov hov-txt" itemprop="item" href="/">
            <span itemprop="name">Home</span>
        </a>
        <i class="fa-solid fa-angle-right"></i>
        <meta itemprop="position" content="1" />
        </li>
        <li itemprop="itemListElement" itemscope
        itemtype="https://schema.org/ListItem">
        @if ( isset($breadcrumb) )
        <a class="shadow-txt hov hov-txt" itemprop="item" href="{{ route('blog') }}">
            <span itemprop="name">Blogs</span>
        </a>
        <i class='fa-solid fa-angle-right'></i>
        @else
        <span itemprop="name">Blogs</span>
        @endif
        <meta itemprop="position" content="2" />
        </li>
        @if ( isset($breadcrumb) )
        <!-- 3つめ -->
        <li itemprop="itemListElement" itemscope
            itemtype="https://schema.org/ListItem">
            <span itemprop="name">{{ $breadcrumb }}</span>
        <meta itemprop="position" content="3" />
        </li>
        @endif
        @endif
    </ol>
</div>
