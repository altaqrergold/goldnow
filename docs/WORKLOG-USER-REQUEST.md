# Work log — user-requested changes only

## Source inspection
The uploaded PHP source passes `php -l`.

Findings in the uploaded source:
- The library merge retains up to 300 records and does not provide a direct, safe bulk-cleanup action for old MP4 files.
- The manual publishing form is Facebook-only. It accepts blank title/description/hashtags and saves a single Facebook payload.
- The source already contains localized title/description/hashtag dictionaries for 15 languages in `auto_rotation_content()`, but those are used only by automatic Facebook rotation.
- The connections page contains placeholder cards for Threads and Instagram; there is no OAuth callback or token exchange flow for either service.
- The Arabic renderer is in the same main PHP file, so all edits must be tightly scoped around cleanup, publishing, and connection methods. Arabic shaping/rendering functions are explicitly out of scope.

## Current verified state
- Git branch: `fix/user-uploaded-version-2026-11-24`
- Uploaded archive SHA-256: `2cec39c65674ff55e4729802ae860edf3566ca171f1c6c5ef4ab4b834d4e5c0d`
- Uploaded main PHP syntax: valid.
- No source-code modifications have been made yet; this commit records the baseline and inspection only.

## Required implementation order
1. Add safe old-video cleanup with queue-state protection and a bounded admin action.
2. Reuse the existing localized copy dictionary to prefill title/description/hashtags when a video is selected, and store platform-specific copies for each enabled target platform.
3. Add Meta OAuth connection flows for Instagram and Threads, with explicit status/error handling and no claim of connection until token verification succeeds.
4. Run PHP syntax checks and focused tests; inspect diff to confirm Arabic rendering functions and assets remain untouched.
