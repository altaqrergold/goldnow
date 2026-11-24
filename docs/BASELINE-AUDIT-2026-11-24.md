# GoldNow Video Publisher — Baseline Audit

Audit date: 2026-11-24  
Source archive: `goldnow-video-publisher.zip`  
Archive SHA-256: `41fcaf2424632ec27b79f68c7668cbae5444be49d338a97863e346ebbf3e8f54`

## Verified source facts

- Archive contains the WordPress plugin PHP file, admin CSS, two background images, and bundled font assets.
- Main PHP file passes `php -l`: no syntax errors.
- Arabic subtitle path includes:
  - `shape_arabic_for_ass()`
  - `build_ass_subtitles()`
  - ASS output with `Shaper: simple` for Arabic
  - FFmpeg `subtitles` filter / libass rather than relying on `drawtext`
- The source schedules cleanup with WordPress daily cron.
- The source has failed-video cleanup logic based on `failed_at` and `DAY_IN_SECONDS`.
- The source has a publishing queue whose current auto-publish payload targets Facebook.
- The live settings screen explicitly says the schedule is settings-only and does not start a real live stream.
- The live screen currently exposes Facebook Live only and says other platform live connectors are not yet verified.

## Important asset defect

The two files named `Almarai-Regular.ttf` and `Almarai-Bold.ttf` in this archive are HTML documents, not valid TTF font files. The plugin must validate font signatures, not just file existence. Existing Cairo and Noto font assets are present and should remain available.

## Preservation rule

The Arabic ASS shaping and subtitle-rendering path is the known-good baseline. Do not replace it with a new renderer. Changes must be isolated, regression-tested against Arabic text, and compared with the user's accepted output.

## Current verification limits

PHP syntax was checked locally. This audit does not claim a WordPress runtime test, a fresh MP4 render on the user's server, external platform publishing, or a live-stream test.
