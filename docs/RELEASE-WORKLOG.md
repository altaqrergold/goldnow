# GoldNow Video Publisher — Release branch work log

Branch: `release/goldnow-video-publisher-complete`

Baseline: `rebuild/working-arabic-baseline` (kept unchanged)

## Implemented in this branch

- Bumped plugin development version to `0.6.8-dev`.
- Changed automatic Gold Manager price refresh to the requested three-hour cadence, both on activation and when settings are saved; activation now clears stale legacy recurrence events before rebuilding schedules. New pilot installs now enable automatic video generation after each refresh by default (publishing remains disabled).
- Removed the unsafe legacy font downloader that saved the generic GitHub homepage response as a `.ttf`; Arabic ASS rendering and the isolated Arabic diagnostic now use the verified bundled Cairo font.
- Added a regression test that the default production matrix contains all 15 languages in both 9:16 and 16:9 formats (30 jobs). Corrected the pilot market assignment so both Arabic and English use Egyptian Gold Manager EGP data, while the other 13 languages remain global USD editions; added assertions for this split.
- Added a Google Cloud Text-to-Speech adapter, secure admin key configuration, 15 locale mappings, MP3 response validation, and FFmpeg narration muxing. Rendering now fails clearly when speech is disabled or unconfigured rather than silently producing another silent-track video. Automated tests mock a valid provider MP3 response and verify locale/payload mapping; a real Google Cloud request still requires the user's API key.
- Recovered the original plugin ZIP from the Library and inspected its media assets. Both cinematic backgrounds and the Noto/Cairo font files are present there; the two legacy Almarai files are not valid TTF files and must not be selected or shipped as usable fonts.
- Reworked failed-video retention so the 24-hour window begins at the recorded final publishing failure, never at MP4 creation time.
- Made cleanup fail closed: any queued, scheduled, uploading, retrying, processing, live, or unknown destination state protects the MP4.
- Added a single safe deletion path that rejects traversal-like filenames, symlinks, paths outside the dedicated media folder, and non-MP4 files.
- Preserved video metadata and records the deletion reason and timestamp.
- Added CLI regression tests for unresolved destinations, missing failure timestamps, the 24-hour boundary, all-destinations-published cleanup, symlinks, and traversal attempts.
- Added GitHub Actions checks for PHP syntax and the retention regression suite.

## Verification

The GitHub Actions run for commit `68686746567374539be3b5bfcf749f6e4a50393b` completed both substantive steps successfully:
- PHP syntax checks: passed.
- Video retention regression tests: passed.

Run: https://github.com/altaqrergold/goldnow/actions/runs/45407358706

## Not yet delivered / not claimed complete

No claim is made here that Google TTS has been verified against a live billable API key, or that international FX adapters, the other four social publishing connectors, or the persistent multi-language live worker are complete. No public publishing or live broadcast was started. A production ZIP has not been built or released.

- Expanded server diagnostics to check both required background images and the Arabic Cairo and English Noto Sans font files explicitly, rather than reporting only the Arabic font.
