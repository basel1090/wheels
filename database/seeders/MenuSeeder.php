<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Menu = [
            [
                "name" => "لوحة التحكم",
                "name_en" => "Dashboard",
                "name_he" => "Dashboard",
                "route" => "home",
                "icon_svg" => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
                                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor"></rect>
                                </svg>',
                "order" => 1,
                "permission_name" => "dashboard_access",
            ],
            [
                "name" => "إدارة المستخدمين",
                "name_en" => "User Management",
                "name_he" => "User Management",
                "route" => NULL,
                "icon_svg" => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="currentColor"></path>
                                <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="currentColor"></rect>
                            </svg>',
                "order" => 2,
                "permission_name" => NULL,
                "subRoutes" => [
                    [
                        "name" => "المستخدمين",
                        "name_en" => "Users",
                        "name_he" => "משתמשים",
                        "route" => "user-management.users.index",
                        "icon_svg" => NULL,
                        "order" => 3,
                        "permission_name" => "user_management_access",
                    ],
                    [
                        "name" => "الصلاحيات",
                        "name_en" => "Roles",
                        "name_he" => "Roles",
                        "route" => "user-management.roles.index",
                        "icon_svg" => NULL,
                        "order" => 4,
                        "permission_name" => "user_management_access",
                    ],
                ]
            ],
            [
                "name" => "الاعدادات",
                "name_en" => "Settings",
                "name_he" => "Settings",
                "route" => NULL,
                "icon_svg" => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M5 8.04999L11.8 11.95V19.85L5 15.85V8.04999Z" fill="currentColor"></path>
                                <path d="M20.1 6.65L12.3 2.15C12 1.95 11.6 1.95 11.3 2.15L3.5 6.65C3.2 6.85 3 7.15 3 7.45V16.45C3 16.75 3.2 17.15 3.5 17.25L11.3 21.75C11.5 21.85 11.6 21.85 11.8 21.85C12 21.85 12.1 21.85 12.3 21.75L20.1 17.25C20.4 17.05 20.6 16.75 20.6 16.45V7.45C20.6 7.15 20.4 6.75 20.1 6.65ZM5 15.85V7.95L11.8 4.05L18.6 7.95L11.8 11.95V19.85L5 15.85Z" fill="currentColor"></path>
                                </svg>',
                "order" => 5,
                "permission_name" => NULL,
                "subRoutes" => [
                    [
                        "name" => "الدول والمدن",
                        "name_en" => "Countries and Cities",
                        "name_he" => "Countries and Cities",
                        "route" => "settings.country-city.index",
                        "icon_svg" => NULL,
                        "order" => 6,
                        "permission_name" => "settings_country_city_access",
                    ],
                    [
                        "name" => "القائمة الرئيسية",
                        "name_en" => "Menu",
                        "name_he" => "Menu",
                        "route" => "settings.menus.index",
                        "icon_svg" => NULL,
                        "order" => 7,
                        "permission_name" => "settings_menu_access",
                    ],
                    [
                        "name" => "استبيانات",
                        "name_en" => "Questionnaires",
                        "name_he" => "Questionnaires",
                        "route" => "settings.questionnaires.index",
                        "icon_svg" => NULL,
                        "order" => 8,
                        "permission_name" => "settings_questionnaire_access",
                    ],
                    [
                        "name" => "الثوابت",
                        "name_en" => "Constants",
                        "name_he" => "Constants",
                        "route" => "settings.constants.index",
                        "icon_svg" => NULL,
                        "order" => 9,
                        "permission_name" => "settings_constants_access",
                    ],

                ]
            ],
            [
                "name" => "المطاعم",
                "name_en" => "Restaurant",
                "name_he" => "Restaurant",
                "route" => NULL,
                "icon_svg" => ' <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/keenthemes/metronic/docs/core/html/src/media/icons/duotune/ecommerce/ecm004.svg-->
<span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path opacity="0.3" d="M18 10V20C18 20.6 18.4 21 19 21C19.6 21 20 20.6 20 20V10H18Z" fill="currentColor"/>
<path opacity="0.3" d="M11 10V17H6V10H4V20C4 20.6 4.4 21 5 21H12C12.6 21 13 20.6 13 20V10H11Z" fill="currentColor"/>
<path opacity="0.3" d="M10 10C10 11.1 9.1 12 8 12C6.9 12 6 11.1 6 10H10Z" fill="currentColor"/>
<path opacity="0.3" d="M18 10C18 11.1 17.1 12 16 12C14.9 12 14 11.1 14 10H18Z" fill="currentColor"/>
<path opacity="0.3" d="M14 4H10V10H14V4Z" fill="currentColor"/>
<path opacity="0.3" d="M17 4H20L22 10H18L17 4Z" fill="currentColor"/>
<path opacity="0.3" d="M7 4H4L2 10H6L7 4Z" fill="currentColor"/>
<path d="M6 10C6 11.1 5.1 12 4 12C2.9 12 2 11.1 2 10H6ZM10 10C10 11.1 10.9 12 12 12C13.1 12 14 11.1 14 10H10ZM18 10C18 11.1 18.9 12 20 12C21.1 12 22 11.1 22 10H18ZM19 2H5C4.4 2 4 2.4 4 3V4H20V3C20 2.4 19.6 2 19 2ZM12 17C12 16.4 11.6 16 11 16H6C5.4 16 5 16.4 5 17C5 17.6 5.4 18 6 18H11C11.6 18 12 17.6 12 17Z" fill="currentColor"/>
</svg>
</span>
<!--end::Svg Icon-->',
                "order" => 10,
                "permission_name" => NULL,
                "subRoutes" => [
                    [
                        "name" => "عرض المطاعم",
                        "name_en" => "Restaurants",
                        "name_he" => "Restaurants",
                        "route" => "restaurants.index",
                        "icon_svg" => NULL,
                        "order" => 11,
                        "permission_name" => "restaurant_access",
                    ],
                    [
                        "name" => "إضافة المطاعم",
                        "name_en" => "Add Restaurants",
                        "name_he" => "Add Restaurants",
                        "route" => "restaurants.create",
                        "icon_svg" => NULL,
                        "order" => 12,
                        "permission_name" => "restaurant_access",
                    ]

                ]
            ],

            [
                "name" => "الكباتن",
                "name_en" => "Captain",
                "name_he" => "Captain",
                "route" => NULL,
                "icon_svg" => '<!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/keenthemes/metronic/docs/core/html/src/media/icons/duotune/communication/com014.svg-->
<span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z" fill="currentColor"/>
<rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2" fill="currentColor"/>
<path d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z" fill="currentColor"/>
<rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3" fill="currentColor"/>
</svg>
</span>
<!--end::Svg Icon-->',
                "order" => 13,
                "permission_name" => NULL,
                "subRoutes" => [
                    [
                        "name" => "عرض الكباتن",
                        "name_en" => "Captains",
                        "name_he" => "Captains",
                        "route" => "captins.index",
                        "icon_svg" => NULL,
                        "order" => 14,
                        "permission_name" => "captin_access",
                    ],
                    [
                        "name" => "إضافة الكباتن",
                        "name_en" => "Add Captins",
                        "name_he" => "Add Captins",
                        "route" => "captins.create",
                        "icon_svg" => NULL,
                        "order" => 15,
                        "permission_name" => "captin_access",
                    ]

                ]
            ],

            [
                "name" => "المكالمات",
                "name_en" => "Calls",
                "name_he" => "Calls",
                "route" => "client_calls_actions.index|client_calls_actions.create",
                "icon_svg" => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M8 8C8 7.4 8.4 7 9 7H16V3C16 2.4 15.6 2 15 2H3C2.4 2 2 2.4 2 3V13C2 13.6 2.4 14 3 14H5V16.1C5 16.8 5.79999 17.1 6.29999 16.6L8 14.9V8Z" fill="currentColor"/>
                                <path d="M22 8V18C22 18.6 21.6 19 21 19H19V21.1C19 21.8 18.2 22.1 17.7 21.6L15 18.9H9C8.4 18.9 8 18.5 8 17.9V7.90002C8 7.30002 8.4 6.90002 9 6.90002H21C21.6 7.00002 22 7.4 22 8ZM19 11C19 10.4 18.6 10 18 10H12C11.4 10 11 10.4 11 11C11 11.6 11.4 12 12 12H18C18.6 12 19 11.6 19 11ZM17 15C17 14.4 16.6 14 16 14H12C11.4 14 11 14.4 11 15C11 15.6 11.4 16 12 16H16C16.6 16 17 15.6 17 15Z" fill="currentColor"/>
                                </svg>',
                "order" => 27,
                "permission_name" => "calls_module_access",
                "subRoutes" => [
                    [
                        "name" => "المكالمات",
                        "name_en" => "Calls",
                        "name_he" => "Calls",
                        "route" => "client_calls_actions.index|client_calls_actions.create",
                        "icon_svg" => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M8 8C8 7.4 8.4 7 9 7H16V3C16 2.4 15.6 2 15 2H3C2.4 2 2 2.4 2 3V13C2 13.6 2.4 14 3 14H5V16.1C5 16.8 5.79999 17.1 6.29999 16.6L8 14.9V8Z" fill="currentColor"/>
                                        <path d="M22 8V18C22 18.6 21.6 19 21 19H19V21.1C19 21.8 18.2 22.1 17.7 21.6L15 18.9H9C8.4 18.9 8 18.5 8 17.9V7.90002C8 7.30002 8.4 6.90002 9 6.90002H21C21.6 7.00002 22 7.4 22 8ZM19 11C19 10.4 18.6 10 18 10H12C11.4 10 11 10.4 11 11C11 11.6 11.4 12 12 12H18C18.6 12 19 11.6 19 11ZM17 15C17 14.4 16.6 14 16 14H12C11.4 14 11 14.4 11 15C11 15.6 11.4 16 12 16H16C16.6 16 17 15.6 17 15Z" fill="currentColor"/>
                                        </svg>',
                        "order" => 28,
                        "permission_name" => "calls_module_access",
                    ],
                    [
                        "name" => "المكالمات مهمات",
                        "name_en" => "Calls Tasks",
                        "name_he" => "Calls Tasks",
                        "route" => "call_tasks.index|call_tasks.create",
                        "icon_svg" => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M8 8C8 7.4 8.4 7 9 7H16V3C16 2.4 15.6 2 15 2H3C2.4 2 2 2.4 2 3V13C2 13.6 2.4 14 3 14H5V16.1C5 16.8 5.79999 17.1 6.29999 16.6L8 14.9V8Z" fill="currentColor"/>
                                        <path d="M22 8V18C22 18.6 21.6 19 21 19H19V21.1C19 21.8 18.2 22.1 17.7 21.6L15 18.9H9C8.4 18.9 8 18.5 8 17.9V7.90002C8 7.30002 8.4 6.90002 9 6.90002H21C21.6 7.00002 22 7.4 22 8ZM19 11C19 10.4 18.6 10 18 10H12C11.4 10 11 10.4 11 11C11 11.6 11.4 12 12 12H18C18.6 12 19 11.6 19 11ZM17 15C17 14.4 16.6 14 16 14H12C11.4 14 11 14.4 11 15C11 15.6 11.4 16 12 16H16C16.6 16 17 15.6 17 15Z" fill="currentColor"/>
                                        </svg>',
                        "order" => 29,
                        "permission_name" => "callTasks_module_access",
                    ],
                    [
                        "name" => "CDR",
                        "name_en" => "CDR",
                        "name_he" => "CDR",
                        "route" => "cdr.index",
                        "icon_svg" => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.3" d="M5 15C3.3 15 2 13.7 2 12C2 10.3 3.3 9 5 9H5.10001C5.00001 8.7 5 8.3 5 8C5 5.2 7.2 3 10 3C11.9 3 13.5 4 14.3 5.5C14.8 5.2 15.4 5 16 5C17.7 5 19 6.3 19 8C19 8.4 18.9 8.7 18.8 9C18.9 9 18.9 9 19 9C20.7 9 22 10.3 22 12C22 13.7 20.7 15 19 15H5ZM5 12.6H13L9.7 9.29999C9.3 8.89999 8.7 8.89999 8.3 9.29999L5 12.6Z" fill="currentColor"/>
                                <path d="M17 17.4V12C17 11.4 16.6 11 16 11C15.4 11 15 11.4 15 12V17.4H17Z" fill="currentColor"/>
                                <path opacity="0.3" d="M12 17.4H20L16.7 20.7C16.3 21.1 15.7 21.1 15.3 20.7L12 17.4Z" fill="currentColor"/>
                                <path d="M8 12.6V18C8 18.6 8.4 19 9 19C9.6 19 10 18.6 10 18V12.6H8Z" fill="currentColor"/>
                                </svg>',
                        "order" => 30,
                        "permission_name" => "cdr_access",
                    ],
                ],

            ]
        ];


        DB::table('menus')->delete();

        foreach ($Menu as $menuItem) {
            // dd($menuItem);
            $parent = Menu::updateOrCreate([
                "name" => $menuItem['name'],
                "name_en" => $menuItem['name_en'],
                "name_he" => $menuItem['name_he'],
                "route" => $menuItem['route'],
                "icon_svg" => $menuItem['icon_svg'],
                "order" => $menuItem['order'],
                "permission_name" => $menuItem['permission_name'],
            ]);
            if (isset($menuItem["subRoutes"])) {
                foreach ($menuItem["subRoutes"] as $subMenu) {
                    Menu::updateOrCreate([
                        "name" => $subMenu['name'],
                        "name_en" => $subMenu['name_en'],
                        "name_he" => $subMenu['name_he'],
                        "route" => $subMenu['route'],
                        "icon_svg" => $subMenu['icon_svg'],
                        "order" => $subMenu['order'],
                        "permission_name" => $subMenu['permission_name'],
                        "parent_id" => $parent->id,
                    ]);
                }
            }
        }

        $this->command->info('Menu created successfully!');
    }
}
