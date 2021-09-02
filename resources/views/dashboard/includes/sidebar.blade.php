<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href=""><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>

            <li class="nav-item  open ">
                <a href=""><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">لغات الموقع </span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2"></span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href=""
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="" data-i18n="nav.dash.crypto">أضافة
                            لغة جديده </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
              <a href=""><i class="la la-group"></i>
                     <span class="menu-title" data-i18n="nav.dash.main">{{ trans('dashboard.main_categories') }}</span>
                     <span class="badge badge badge-danger badge-pill float-right mr-2">{{ \App\Models\category::count() }}</span>
              </a>
              <ul class="menu-content">
              <li class="active">
                     <a class="menu-item" href="{{route('admin.maincategories')}}"
                            data-i18n="nav.dash.ecommerce">{{ trans('dashboard.all_main_categories') }}</a>
              </li>
              <li>
                     <a class="menu-item" href="{{ route('admin.maincategories.create')}}" 
                     data-i18n="nav.dash.crypto">{{ trans('dashboard.add_new_category') }}</a>
              </li>
              </ul>
            </li>

            {{-- <li class="nav-item"><a href="{{ route('admin.subcategories') }}"><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{ trans('dashboard.sub_categories') }}</span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">{{ \App\Models\category::child() ->count() }}</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{ route('admin.subcategories') }}"
                                          data-i18n="nav.dash.ecommerce">{{ trans('dashboard.all_sub_categories') }}</a>
                    </li>
                    <li><a class="menu-item" href="{{route('admin.subcategories.create')}}" data-i18n="nav.dash.crypto">{{ trans('dashboard.add_new_sub_category') }}</a>
                    </li>
                </ul>
            </li> --}}
            <li class="nav-item">
                     <a href=""><i class="la la-group"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">{{ trans('dashboard.brands') }}</span>
                            <span class="badge badge badge-danger badge-pill float-right mr-2"></span>
                     </a>
                     <ul class="menu-content">
                            <li class="active">
                                   <a class="menu-item" href="{{ route('admin.brands') }}"
                                          data-i18n="nav.dash.ecommerce">{{ trans('dashboard.all_brands') }}</a>
                            </li>
                            <li>
                                   <a class="menu-item" href="{{ route('admin.brands.create') }}" 
                                   data-i18n="nav.dash.crypto">{{ trans('dashboard.add_new_brand') }}</a>
                            </li>
                     </ul>
            </li>

              <li class="nav-item">
                     <a href=""><i class="la la-group"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">{{ trans('dashboard.tags') }}</span>
                            <span class="badge badge badge-danger badge-pill float-right mr-2"></span>
                     </a>
                     <ul class="menu-content">
                            <li class="active">
                                   <a class="menu-item" href="{{ route('admin.tags') }}"
                                          data-i18n="nav.dash.ecommerce">{{ trans('dashboard.all_tags') }}</a>
                            </li>
                            <li>
                                   <a class="menu-item" href="{{ route('admin.tags.create') }}" 
                                   data-i18n="nav.dash.crypto">{{ trans('dashboard.add_new_tags') }}</a>
                            </li>
                     </ul>
              </li>

              <li class="nav-item">
                     <a href=""><i class="la la-group"></i>
                            <span class="menu-title" data-i18n="nav.dash.main">{{ trans('dashboard.products') }}</span>
                            <span class="badge badge badge-danger badge-pill float-right mr-2"></span>
                     </a>
                     <ul class="menu-content">
                            <li class="active">
                                   <a class="menu-item" href="{{ route('admin.products') }}"
                                          data-i18n="nav.dash.ecommerce">{{ trans('dashboard.all_products') }}</a>
                            </li>
                            <li>
                                   <a class="menu-item" href="{{ route('admin.products.general.create') }}" 
                                   data-i18n="nav.dash.crypto">{{ trans('dashboard.add_new_product') }}</a>
                            </li>
                            <li>
                                   <a class="menu-item" href="{{ route('admin.attributes') }}" 
                                   data-i18n="nav.dash.crypto">{{ trans('dashboard.product_attributes') }}</a>
                            </li>
                            <li>
                                   <a class="menu-item" href="{{ route('admin.attributes.create') }}" 
                                   data-i18n="nav.dash.crypto">{{ trans('dashboard.add_new_attributes') }}</a>
                            </li>

                            <li>
                                   <a class="menu-item" href="{{ route('admin.options') }}" 
                                   data-i18n="nav.dash.crypto">{{ trans('dashboard.product_attributes_otions') }}</a>
                            </li>
                            <li>
                                   <a class="menu-item" href="{{ route('admin.options.create') }}" 
                                   data-i18n="nav.dash.crypto">{{ trans('dashboard.add_new_attributes_options') }}</a>
                            </li>
                     </ul>
              </li>

        


            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{ trans('dashboard.permissions') }}  </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2"></span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{ route('admin.roles.index') }}"
                                          data-i18n="nav.dash.ecommerce"> {{ trans('dashboard.permissions') }} </a>
                    </li>
                    <li><a class="menu-item" href="{{ route('admin.roles.create') }}" data-i18n="nav.dash.crypto">{{ trans('dashboard.add_new_opermission') }} </a>
                    </li>
                </ul>
            </li>




            {{--shippings_methods-------------------------------------------------------------------------------------}}
            <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title"
              data-i18n="nav.templates.main">{{ trans('dashboard.settings') }}</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="#" data-i18n="nav.templates.vert.main">{{ trans('dashboard.shipping_methods') }}</a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href="{{route('edit.shippings.methods' ,'freeshipping')}}"
                                   data-i18n="nav.templates.vert.classic_menu">{{ trans('dashboard.free_shipping') }}</a>
                            </li>
                            <li><a class="menu-item" href="{{route('edit.shippings.methods' ,'internalshipping')}}">{{ trans('dashboard.internal_shipping') }}</a>
                            </li>
                            <li><a class="menu-item" href="{{route('edit.shippings.methods' ,'externalshipping')}}"
                                   data-i18n="nav.templates.vert.compact_menu">{{ trans('dashboard.external_shipping') }}</a>
                            </li>
                        </ul>
                    </li>

                    <li><a class="menu-item" href="#"
                     data-i18n="nav.templates.vert.main"> {{__('dashboard.slider')}} </a>
                            <ul class="menu-content">
                                   <li>
                                          <a class="menu-item" href="{{route('admin.sliders.create')}}"
                                                 data-i18n="nav.templates.vert.classic_menu"> {{trans('dashboard.slider_image')}} 
                                          </a>
                                   </li>
                            </ul>
                     </li>
                </ul>
            </li>
            {{--shippings_methods----------------------------------------------------------------------------------}}
    </div>
</div>
