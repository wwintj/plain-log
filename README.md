# Plain Log

A minimal, text-first WordPress theme for personal logs and technical notes.

## Features

- Classic WordPress theme with a chronological, text-first Home index
- Consistent responsive canvas and surface layouts across Home, Single Posts,
  archives, search, Pages, utility indexes, and 404 pages
- Post ID friendly design with Category, Tag, year, and month archives
- All-post Archive index, Search, and Categories/Tags discovery indexes
- Single Post and Page layouts with WordPress multipage content navigation
- WordPress Core comments, including threaded replies when enabled
- Progressive code-block enhancement with visual line numbers and a Copy control
- System dark mode, print styles, and a responsive, accessible baseline
- Simplified Chinese (`zh_CN`) and Traditional Chinese (`zh_TW`) translations
- Locale-aware Chinese system font stacks with no bundled or remote fonts
- No build system or third-party frontend dependencies

## Requirements

- WordPress 7.0 or later
- PHP 7.4 or later

Plain Log has been tested with WordPress 7.0.x. It does not require Node.js,
npm, Composer, a plugin, or a build step.

## Installation

1. Download the release ZIP.
2. In WordPress, go to **Appearance → Themes → Add New → Upload Theme**.
3. Upload `plain-log.zip`.
4. Activate Plain Log.

Git users may instead clone the repository into
`wp-content/themes/plain-log` and activate the Theme in WordPress.

## Recommended Site Setup

Plain Log provides presentation and templates. It does not create Pages or
change WordPress settings when activated.

For the complete navigation and discovery layout, create these optional Pages
yourself:

| Page | Slug |
| --- | --- |
| Archive | `archive` |
| Search | `search` |
| Categories | `categories` |
| Tags | `tags` |
| About | `about` |

A suggested Primary Menu is **Home, Archive, Search, About**. Footer links for
Categories and Tags appear only when the corresponding published Pages exist;
the RSS link uses the WordPress posts feed.

The recommended post permalink is `/p/%post_id%/`. Configure it yourself under
**Settings → Permalinks**; it is a recommendation, not a requirement. Plain Log
never changes permalink, discussion, or other site settings on activation.
Configure comments and pingbacks through WordPress discussion settings.

## Content and Navigation

A normal Post consists of a title, content, one broad Category, and optional
Tags. Use Pages for static content such as About. Featured Images are not part
of the current Plain Log design.

WordPress `<!--nextpage-->` pagination is supported on Single Posts and Pages.
This uses WordPress Core multipage content behavior rather than a custom
pagination system.

## Code Blocks

Code blocks preserve whitespace and scroll horizontally when necessary. On a
Single Post containing code, Plain Log progressively enhances code blocks with
line numbers and a small Copy control. Line numbers are visual only and are not
included in copied code. Plain Log does not add syntax highlighting.

## Comments

Plain Log follows WordPress discussion settings and does not change them. When
comments are closed and a post has no comments, no comments UI is shown. When
comments are open, the WordPress Core comment list and form are available.
Existing comments remain visible if comments are later closed.

Threaded replies use the WordPress Core `comment-reply` script. Avatars are
intentionally disabled by the Theme. Plain Log adds no third-party comment
system or custom comment-submission logic.

## Localization and Fonts

Source gettext message IDs are written in English. Plain Log bundles:

- Simplified Chinese (`zh_CN`)
- Traditional Chinese for Taiwan (`zh_TW`)

Frontend Chinese locales use installed system font candidates. `zh-TW` and
`zh-Hant` prefer PingFang TC, Noto Sans TC, and Microsoft JhengHei; `zh-CN` and
`zh-Hans` prefer PingFang SC, Noto Sans SC, and Microsoft YaHei; `zh-HK` prefers
PingFang HK, Noto Sans HK, and Traditional Chinese system fallbacks. The actual
rendered font depends on device availability. No `zh_HK` translation is bundled.

Plain Log bundles no font files and makes no Google Fonts or other remote font
requests.

## Privacy and Dependencies

Plain Log does not add analytics, telemetry, advertising, third-party tracking,
remote fonts, or external CDN resources. Comment data, when comments are
enabled, is handled by WordPress Core according to the site's discussion and
privacy configuration.

The Theme has no third-party frontend runtime dependency and no build system.

## Known Limitations

Plain Log does not provide syntax highlighting, a table of contents, Featured
Image UI, an SEO engine, analytics, a theme settings panel, a page builder, or
AJAX search.

## Development

The Theme uses PHP, CSS, `theme.json`, and a small vanilla JavaScript file. It
has no build system. The frozen V1 historical specification and project rules
are documented in [`SPEC.md`](SPEC.md) and [`AGENTS.md`](AGENTS.md).

## License

Plain Log is licensed under [GPL-2.0-or-later](LICENSE).
