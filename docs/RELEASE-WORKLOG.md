# GoldNow Video Publisher — Release branch work log

Branch: `release/goldnow-video-publisher-complete`

Baseline: `rebuild/working-arabic-baseline` (kept unchanged)

## Implemented in this branch

- Bumped plugin development version to `0.6.8-dev`.
- Changed automatic Gold Manager price refresh from hourly to the requested three-hour cadence, both on activation and when settings are saved.
- Reworked failed-video retention so the 24-hour window begins at the recorded final publishing failure, never at MP4 creation time.
- Made cleanup fail closed: any queued, scheduled, uploading, retrying, processing, live, or unknown destination state protects the MP4.
- Added a single safe deletion path that rejects traversal-like filenames, symlinks, paths outside the dedicated media folder, and non-MP4 files.
- Preserved video metadata and records the deletion reason and timestamp.
- Added CLI regression tests for unresolved destinations, missing failure timestamps, the 24-hour boundary, all-destinations-published cleanup, symlinks, and traversal attempts.
- Added GitHub Actions checks for PHP syntax and the retention regression suite.

## Verification

The GitHub Actions run for commit `d31c63c2d485547ffe2725230857e579e8d2a1b1` completed both substantive steps successfully:
- PHP syntax checks: passed.
- Video retention regression tests: passed.

Run: https://github.com/altaqrergold/goldnow/actions/runs/45407358706

## Not yet delivered / not claimed complete

No claim is made here that TTS, international FX adapters, the other four social publishing connectors, or the persistent multi-language live worker are complete. No public publishing or live broadcast was started. A production ZIP has not been built or released.
