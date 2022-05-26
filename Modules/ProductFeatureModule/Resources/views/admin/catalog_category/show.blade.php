@extends('commonmodule::layouts.master')


@section('title')
    {{__('productmodule::category.addNew')}}
@endsection



@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/css/design-css/design.css')}}" type="text/css" >
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/treeview/default/style.min.css')}}" type="text/css" >
<link rel="stylesheet" href="{{ asset('assets/admin/css/ui-kit/custom-tree_view.css')}}" type="text/css" >
@endsection



@section('content')

<div id="content" class="main-content">
    <div class="container">
      <div class="row">
          <div class="col-12">
            <article class="mb-5">
              <div class="row">
                  <div class="col-md-4 text-center">
                      <div class="thumbnail-img">
                          <img alt="blog-image" src="{{asset('images/category/'.$category->photo)}}" class="img-fluid  mb-md-0 mb-4">
                      </div>
                  </div>
                  <div class="col-md-8 text-md-left text-center">
                      <h4 class="post-heading">{{$category->name_ar}}</h4>
                      <p class="meta mb-4"><span class="post-category">Crated At </span>/ <span class="post-meta-info">{{$category->created_at}}</span></p>
                      <p class="post-text text-justify">{{$category->desc_ar}}</p>
                      <div class="row mt-5">
                          <div class="col-md-8 col-sm-8 col-12">
                              <div class="media usr-meta mx-auto mx-sm-0 mb-sm-0 mb-4">
                                  <h5>القسم الاساسى</h5>:
                                  <div class="media-body">
                                      <h6 class="meta-usr-name pl-2">{{($category->parent['name_ar']) ?? 'فئة رئيسية'}}</h6>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </article>
          </div>




          <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 ">
              <div class="statbox widget box box-shadow">
                  <div class="widget-content widget-content-area">

                      <div class="treeview mb-4" data-role="treeview">
                          <ul>
                              <li class="node">
                                  <span class="leaf">{{$category->name_ar}}</span>
                                  @if(isset($category->child) && $category->child->count() > 0)
                                  <span class="node-toggle"></span>
                                  <ul>
                                    @foreach($category->child as $child )

                                      @if(isset($child->child) && $child->child->count() > 0)

                                      <li class="node ">
                                          <span class="leaf">{{$child->name_ar}}</span>
                                          <span class="node-toggle"></span>
                                          <ul>
                                            @foreach($child->child as $childchild )
                                              <li><span class="leaf">{{$childchild->name_ar}}</span></li>
                                            @endforeach
                                          </ul>
                                      </li>

                                      @else
                                        <li><span class="leaf">{{$child->name_ar}}</span></li>
                                      @endif





                                    @endforeach
                                  </ul>
                                @endif
                              </li>
                          </ul>
                      </div>

                  </div>
              </div>
          </div>




      </div>

    </div>
</div>

@stop

@section('js')
<script  src="{{ asset('assets/admin/js/design-js/design.js')}}" ></script>
<script  src="{{ asset('assets/admin/plugins/treeview/jstree.min.js')}}" ></script>
<script  src="{{ asset('assets/admin/plugins/treeview/custom-jstree.js')}}" ></script>

@endsection
