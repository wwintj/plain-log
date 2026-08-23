=== Plain Log ===
Requires at least: 7.0
Tested up to: 7.0
Requires PHP: 7.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A minimal, text-first WordPress theme for personal logs and technical notes, with responsive layouts, code copy, comments, and CJK localization.

== Description ==

Plain Log is a Classic WordPress theme for personal logs and technical notes. It provides a text-first, one-column reading experience with a chronological Home index, archives, search, Categories and Tags discovery indexes, and focused Single Post and Page layouts.

Responsive surfaces, system dark mode, and print styles keep content readable across screen sizes and output formats. Single Posts containing code are progressively enhanced with visual line numbers and a small Copy control. Line numbers are not included in copied code. Plain Log does not provide syntax highlighting.

Plain Log supports WordPress Core comments according to the site's discussion settings. When comments are closed and none exist, no comments UI is shown; when comments are open, the Core comment list and form are available. Existing comments remain visible when discussion is later closed, threaded replies use the Core comment-reply script, and avatars are intentionally disabled. WordPress `<!--nextpage-->` pagination is supported on Single Posts and Pages.

English source strings, Simplified Chinese (zh_CN), and Traditional Chinese for Taiwan (zh_TW) are included. Frontend zh-TW/zh-Hant locales prefer PingFang TC, Noto Sans TC, and Microsoft JhengHei; zh-CN/zh-Hans prefer PingFang SC, Noto Sans SC, and Microsoft YaHei; zh-HK prefers PingFang HK, Noto Sans HK, and Traditional Chinese system fallbacks. The actual rendered font depends on device availability. The Theme bundles no webfonts and makes no external font requests.

Plain Log has no build system and no third-party frontend dependency.

== Installation ==

1. In WordPress, go to Appearance > Themes > Add New > Upload Theme.
2. Upload the Plain Log ZIP.
3. Activate Plain Log.
4. Configure a Primary Menu under Appearance > Menus if desired.
5. Optionally create Pages for Archive (archive), Search (search), Categories (categories), Tags (tags), and About (about).

No plugin, Node.js, Composer, or build step is required.

== Recommended Setup ==

Plain Log never creates Pages or changes permalink, discussion, or other site settings on activation. The recommended post permalink is /p/%post_id%/, but it is not required. Configure permalinks and comments through WordPress settings.

== Frequently Asked Questions ==

= Does Plain Log change my WordPress settings? =

No. The Theme provides presentation and templates only. It does not change permalinks, discussion settings, or other site configuration.

= Does Plain Log load external fonts or third-party frontend resources? =

No. It uses installed system fonts and bundles no third-party frontend libraries, remote fonts, CDN assets, analytics, or telemetry.

= Does Plain Log support comments? =

Yes. It follows WordPress Core discussion settings and uses the Core comment list, form, navigation, and threaded-reply behavior. It does not add a third-party comment system or custom comment-submission logic.

= Does Plain Log include syntax highlighting? =

No. On Single Posts containing code, it progressively adds visual line numbers and a Copy control only.

= Does Plain Log support featured images? =

No Featured Image UI is part of the current design.

= Which languages are bundled? =

The source strings are English. Simplified Chinese (zh_CN) and Traditional Chinese for Taiwan (zh_TW) translations are bundled.

== Privacy ==

Plain Log does not add analytics, telemetry, advertising, remote fonts, external CDN resources, or third-party tracking. Comment data, when comments are enabled, is handled by WordPress Core according to the site's discussion and privacy configuration.

== Changelog ==

= 1.3.1 =
* Added WordPress.org directory theme tags required for submission.

= 1.3.0 =
* Added WordPress Core comments support.
* Added multipage post and page navigation.
* Added locale-aware Chinese system font stacks.
* Added Traditional Chinese (zh_TW) localization.
* Internationalized the RSS footer label.
* Added WordPress and PHP compatibility metadata.
* Added WordPress.org distribution documentation.
* Added a WordPress.org theme screenshot.
* Refined Previous/Next post navigation for balanced desktop and mobile layouts.

= 1.2.0 =
* Unified responsive surface layouts across Home, archives, search, Pages, utility indexes, and 404 pages.
* Consolidated the surface styling for maintainability and consistent Site Chrome geometry.

= 1.1.0 =
* Refined Single Post reading surfaces and Site Chrome.
* Redesigned code blocks with visual line numbers and a Copy control.
* Kept visual line numbers out of copied code and fixed trailing-newline line counts.

= 1.0.0 =
* Initial public release.
* Added chronological Home, Single Post, Page, archive, search, taxonomy-index, and 404 templates.
* Added conditional code copying, system dark mode, print styles, and Simplified Chinese localization.

== Upgrade Notice ==

= 1.3.1 =
Adds WordPress.org directory metadata required for theme submission.

= 1.3.0 =
Adds Core comments support, multipage content navigation, Traditional Chinese localization, and locale-aware Chinese system font stacks.

== Resources ==

Plain Log theme code and design:
Copyright (C) 2026 Plain Log contributors
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

No third-party libraries, fonts, images, icons, or other external resources are bundled with the theme.
