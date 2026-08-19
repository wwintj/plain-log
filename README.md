# Plain Log

A minimal, text-first WordPress theme for personal logs and technical notes.

## Features

- Classic WordPress theme with a chronological, text-first home index
- Post ID friendly design with Category, Tag, year, and month archives
- All-post Archive index, Search, and Categories/Tags indexes
- Minimal Single Post layout with Published/Updated metadata, Tags, and Previous/Next navigation
- Conditional code-copy enhancement for posts containing code blocks
- System dark mode, print styles, and a responsive, accessible baseline
- Simplified Chinese (`zh_CN`) localization and WordPress RSS feed link
- No third-party frontend dependencies

Plain Log does not include syntax highlighting, a table of contents, comments UI,
Featured Image UI, an SEO engine, analytics, theme settings, a page builder, or
AJAX search.

## Requirements

Plain Log is a WordPress Classic Theme and requires a functioning WordPress
installation. It does not require Node.js, npm, Composer, or a build step.

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

For the complete navigation and discovery layout, create these Pages yourself:

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
**Settings → Permalinks**; the Theme never changes permalink settings. If you do
not need comments or pingbacks, disable them through WordPress Settings. Theme
activation does not change those settings.

## Content Model

A normal Post consists of a title, content, one broad Category, and optional
Tags. Use Pages for static content such as About. Featured Images are not part
of the Plain Log V1 design.

## Code Blocks

Code blocks preserve whitespace and scroll horizontally when necessary. On a
Single Post containing code, Plain Log progressively enhances code blocks with
line numbers and a small Copy control. Line numbers are visual only and are not
included in copied code. Plain Log does not add syntax highlighting.

## Localization

Plain Log includes Simplified Chinese (`zh_CN`). Source gettext message IDs are
written in English.

## Development

The Theme uses PHP, CSS, `theme.json`, and a small vanilla JavaScript file. It
has no build system. Product and development rules are documented in
[`SPEC.md`](SPEC.md) and [`AGENTS.md`](AGENTS.md).

## License

Plain Log is licensed under [GPL-2.0-or-later](LICENSE).
