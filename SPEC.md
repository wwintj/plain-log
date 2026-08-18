# Plain Log V1 Frozen Specification

This document is the frozen product and technical specification for Plain Log V1.
Unless a future task explicitly changes this specification, features outside this
document are out of scope.

## Product

Plain Log is a plain-text-first, single-column, minimal, programmatic, and
long-lived WordPress Classic Theme. It is intended for personal logs, technical
notes, homelabs, Linux and Windows, networking, VPS administration, WordPress,
development, and everyday records.

Its only core goals are:

- Write.
- Read.
- Find.

A feature that does not clearly improve one of those goals does not enter V1 by
default.

## Architecture and Responsibilities

V1 uses:

- A WordPress Classic Theme, not a Block Theme or Full Site Editing theme.
- Gutenberg.
- `theme.json`.
- PHP templates.
- Native CSS.
- A very small amount of vanilla JavaScript, loaded only where specified.

The Theme is responsible for presentation only. It must not automatically
change site configuration or behavior on activation, including:

- Permalink settings.
- Site title.
- Timezone.
- Comment settings.
- Pingback or trackback settings.
- Users.
- Security settings.
- SEO settings.
- Database schema.

The target site-level post permalink configuration is `/p/%post_id%/`. The post
ID is the permanent identity. Changing a title, publication date, category, or
tag must not require the permalink to change.

## Content Model

V1 uses only WordPress Posts and Pages. It creates no custom post types, custom
taxonomies, or custom fields.

The normal log publishing workflow is:

- Title.
- Content.
- One primary Category.
- Optional Tags.

The workflow does not require an excerpt, featured image, SEO title, meta
description, focus keyword, Open Graph image, author metadata, or layout
settings.

Categories represent stable broad domains. Tags are reusable, specific retrieval
keywords.

## Home

The home page is a plain-text chronological index with:

- One column and a maximum content width of 760px.
- 20 posts per page.
- `post_date DESC` ordering.
- Posts grouped by year.
- Dates displayed as `MM-DD` in a monospace font.
- Post title and Category.

It does not show Tags, excerpts, images, Featured Images, authors, comments,
reading time, cards, a sidebar, or a hero.

Pagination uses only `← Newer` and `Older →`, with no numbered pagination.
Long titles must wrap naturally in full and must never use an ellipsis.

## Header

The desktop target is:

```text
Site Title                         Archive  Search  About
```

- Site Title is a text link to `/`.
- There is no logo or icon library.
- The header is neither sticky nor fixed and has no shadow.
- There is no hamburger menu.
- On mobile, navigation may wrap to a second line.
- Navigation must not depend on JavaScript.

## Single Post

- The post title is the `h1`.
- Content has a maximum width of 760px.
- Body text is approximately 16px with a 1.75 line height.
- Metadata shows `Published YYYY-MM-DD`.
- Category is shown when present.
- `Updated YYYY-MM-DD` is shown only when modification occurred on a different
  calendar date from publication.
- An update never affects list ordering.
- Tags appear below the content; when none exist, the entire Tags section is
  omitted.
- Previous and Next navigation follows `post_date`, uses a vertical layout, and
  is not restricted to the same Category.

Single posts do not show a Featured Image, author box, comments, related posts,
sharing controls, likes, or a view count.

## Table of Contents and Heading Anchors

V1 does not implement an automatic table of contents, heading-anchor UI,
heading `#` controls, or a heading parser. These may be considered for V1.1 but
are not part of V1.

## Code Blocks and Copy Enhancement

Code blocks must:

- Use a monospace font.
- Preserve original whitespace and indentation.
- Use `white-space: pre`.
- Scroll horizontally within the block when too wide.
- Never widen the whole document.

V1 does not provide syntax highlighting, language badges, line numbers, or
terminal-prompt parsing.

The only Theme JavaScript enhancement is code copying. When JavaScript is
available, code blocks may offer a `Copy` control that briefly displays `Copied`
after success and may display `Copy failed` after failure. It copies the actual
text in `<pre>` or `<code>` without guessing at or removing shell prompts. The
control must be hidden or absent when JavaScript is unavailable.

## Archive Page

`/archive/` lists all published posts without pagination, ordered by
`post_date DESC` and grouped by year. Each item contains only the date and title.
It contains no excerpt, image, or Tags.

## Search

Search uses a normal HTML GET form and WordPress Core search behavior:

- 20 results per page.
- No AJAX, instant search, or JavaScript dependency.
- The submitted term remains in the input.
- Results show the title and Category, but no excerpt.
- An empty query must not return all posts.
- No results displays the concise text `No results.`
- There are no popular recommendations.
- V1 has no custom ranking engine and should defer to WordPress Core ranking.

## Archives and Indexes

V1 supports:

- Category Archive.
- Tag Archive.
- Year Archive.
- Month Archive.
- Categories Index.
- Tags Index.

These pages share the same index visual language. The Categories Index shows
each category name and post count. The Tags Index shows each tag name and post
count, sorted by name. It is not a tag cloud, and font size does not vary with
post count.

## 404

A missing resource must return a real HTTP 404. The page contains only the
essential `404`, `Page not found.`, a search form, and an Archive link.

It must not redirect to the home page, make fuzzy guesses, recommend popular
posts, or provide an intelligent redirect system. A deleted post's former
permalink must return a normal 404.

## Visual System

The visual system uses:

- Black, white, and gray with no brand accent color.
- System fonts and system monospace fonts.
- A single column with a maximum width of 760px.
- Tokens for background, text, muted text, borders, and code background.
- Primarily font weights 400 and 600.

It does not use web fonts, Google Fonts, cards, shadows, animation, an icon
library, a hero, a sidebar, or large rounded interface surfaces.

## Dark Mode

Dark mode uses only `prefers-color-scheme`. There is no dark-mode toggle,
`localStorage`, cookie, or JavaScript preference system.

## JavaScript Policy

Theme JavaScript must be zero on the home page, Archive, Search, Category
Archive, and Tag Archive. A Single Post without a code block also has zero Theme
JavaScript. Only a Single Post with a code block that needs the Copy enhancement
may load the tiny vanilla JavaScript described above.

## Dependencies and Development Model

V1 must not introduce:

- Tailwind.
- Bootstrap.
- A jQuery dependency.
- React, Vue, or Alpine.
- Prism or Highlight.js.
- Font Awesome or Google Fonts.
- CSS, JavaScript, PHP, or other frontend frameworks and libraries.
- Any third-party frontend runtime dependency.

V1 also has no development build chain: no npm, pnpm, Yarn, Webpack, Vite, Sass,
or Composer unless a future specification explicitly changes this policy.

The development model remains PHP + CSS + JSON + tiny JavaScript.

## Network and Privacy

By default, the Theme makes zero third-party requests, loads zero web fonts,
sets zero Theme cookies, and includes no analytics or telemetry.

Unless post content deliberately embeds an external resource, the Theme must not
initiate requests to Google, a font CDN, jsDelivr, cdnjs, unpkg, Gravatar, an
analytics provider, or social-network assets.

## WordPress Core

The Theme must respect and reuse WordPress Core. It must correctly call:

- `wp_head()`.
- `wp_body_open()`.
- `wp_footer()`.

It must not pursue purported performance or source cleanliness by aggressively
dequeuing Gutenberg or Core CSS, performing broad `remove_action` calls,
emptying `wp_head`, disabling the REST API or XML-RPC, or adding security
hardening in the Theme.

Do not reimplement behavior that Core already solves. Prefer WordPress Core for
image lazy loading, responsive images, and similar platform behavior.

## HTML and Accessibility

Use semantic HTML, including the appropriate use of `<header>`, `<nav>`,
`<main>`, `<article>`, `<section>`, `<footer>`, `<form>`, `<label>`, `<button>`,
and `<time>`.

V1 must provide:

- A Skip to content link.
- Keyboard navigation.
- A visible `:focus-visible` state.
- A proper search label.
- A proper heading hierarchy.
- `<time datetime="">` for dates.
- A usable layout at 200% zoom.
- Readability at a 320px viewport.

Use a real `<button>` instead of a `<div role="button">`. With CSS disabled,
the document structure must remain meaningful. With JavaScript disabled, all
core functionality except the Copy enhancement must continue to work.

## Responsive Behavior and Edge Cases

The Theme must correctly handle:

- Very long Chinese and English titles.
- Long URLs and unbreakable strings.
- Overwide code and tables.
- Large, small, and broken images.
- Missing Category or Tags.
- Empty post content.
- Untitled posts.
- Missing Previous or Next posts.
- Password-protected posts.
- Empty search and archive results.

Ordinary prose may break sensibly. Code does not wrap and scrolls within its own
container. An overwide table scrolls within its own container. Code and tables
must not introduce document-level horizontal overflow.

Untitled posts use one consistent, internationalizable fallback.

## Print

V1 includes a simple `@media print` treatment. Printed articles retain the
title, Published and Updated metadata, article content, headings, code, tables,
and images. Printing hides header navigation, Copy controls, Previous and Next
navigation, and footer navigation. Print output uses a white background and dark
text.

## Performance Budget

Guidance, not a hard limit at the expense of maintainability:

- Theme CSS should be approximately 20 KB or less uncompressed.
- Theme JavaScript should be approximately 3 KB or less uncompressed.

## Explicit V1 Non-Goals

V1 must not implement:

- Logo or favicon systems.
- Featured Image UI.
- Hero, sidebar, widgets, or comments UI.
- Related Posts, social sharing, likes, or view counters.
- Newsletter, author card, or social icons.
- Analytics or telemetry.
- Syntax highlighting.
- Automatic table of contents or heading-anchor UI.
- AJAX or instant search.
- Theme Options page, font picker, or color picker.
- Dark Mode switch.
- Custom Gutenberg blocks or patterns.
- Shortcodes.
- Custom post types, taxonomies, or fields.
- SEO or cache engines.
- Security hardening.
- Theme update system.

Do not add any of these incidentally unless a development task explicitly
changes this specification.

## Feature Admission Rule

Before admitting a future feature, ask:

1. Does it clearly help people write, read, or find?
2. Does WordPress Core already provide it?
3. Would the site remain fully usable if it were removed?

When value is not clear, defer the feature.
