<h4>{{ __('menumanage::menuManage.Menu List') }}</h4>
<div class="">
    <div class="row">
        <div class="col-xl-12 menu_item_div" id="itemDiv">
            @foreach ($sidebar_menus as $section)
                <div class="closed_section" data-id="{{ $section->permission_id }}">
                    <!-- menu_setup_wrap  -->
                    <div class="section_nav">
                        <h5>{{ __($section->permissionInfo->lang_name) }}</h5>
                        <div class="setting_icons">
                            <i class="ti-close delete_section" data-id="{{ $section->id }}"></i>
                            <i class="ti-angle-up toggle_up_down"></i>
                        </div>
                    </div>
                    <div class="dd menu_list">
                        @if ($section->subModule->count())
                            <div class="dd-list menu-list" data-id="{{ $section->id }}"
                                data-section_id="{{ $section->permission_id }}">
                                @foreach ($section->subModule as $menu)
                                    @if (userPermission($menu->permissionInfo->route))
                                        <!-- dd-item  -->
                                        <div class="dd-item listed_menu" data-id="{{ $menu->id }}"
                                            data-parent_id="{{ $section->id }}" data-section_id="{{ $section->id }}">
                                            <div class="dd-handle">
                                                <div class="menu_icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-move icon-16 text-off mr5">
                                                        <polyline points="5 9 2 12 5 15"></polyline>
                                                        <polyline points="9 5 12 2 15 5"></polyline>
                                                        <polyline points="15 19 12 22 9 19"></polyline>
                                                        <polyline points="19 9 22 12 19 15"></polyline>
                                                        <line x1="2" y1="12" x2="22"
                                                            y2="12"></line>
                                                        <line x1="12" y1="2" x2="12"
                                                            y2="22"></line>
                                                    </svg>
                                                </div>
                                                {{ __($menu->permissionInfo->lang_name) }}
                                            </div>
                                            <div class="edit_icon">
                                                <span class="make-sub-menu toggle-menu-icon">
                                                    <i class="ti-back-left"></i>
                                                </span>
                                                <i class="ti-close remove_menu"></i>
                                            </div>
                                        </div>
                                        @foreach ($menu->subModule as $submenu)
                                            @if (userPermission($submenu->permissionInfo->route))
                                                <div class="dd-item listed_menu ml_20" data-id="{{ $submenu->id }}"
                                                    data-parent_id="{{ $menu->id }}"
                                                    data-section_id="{{ $section->id }}">
                                                    <div class="dd-handle">
                                                        <div class="menu_icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-move icon-16 text-off mr5">
                                                                <polyline points="5 9 2 12 5 15"></polyline>
                                                                <polyline points="9 5 12 2 15 5"></polyline>
                                                                <polyline points="15 19 12 22 9 19"></polyline>
                                                                <polyline points="19 9 22 12 19 15"></polyline>
                                                                <line x1="2" y1="12" x2="22"
                                                                    y2="12"></line>
                                                                <line x1="12" y1="2" x2="12"
                                                                    y2="22"></line>
                                                            </svg>
                                                        </div>
                                                        {{ __($submenu->permissionInfo->lang_name) }}
                                                    </div>
                                                    <div class="edit_icon">
                                                        <span class="make-root-menu toggle-menu-icon">
                                                            <i class="ti-back-right"></i>
                                                        </span>
                                                        <i class="ti-close remove_menu"></i>
                                                    </div>

                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                        @else
                            <div class="dd-list menu-list" data-id="{{ $section->id }}"
                                data-section_id="{{ $section->permission_id }}">
                                <span class="empty_list">{{ __('menu.no_more_items_available') }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
            <!--/ menu_setup_wrap  -->
        </div>
    </div>
</div>
