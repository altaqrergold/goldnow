# AlTaqrer Gold — Implementation Plan

This is the implementation source of truth for the rebuild. Work is performed on `release/goldnow-video-publisher-complete`, based on the immutable `rebuild/working-arabic-baseline`; do not modify `main` or deploy automatically.

## Product scope

- 15 languages: Arabic, English, French, German, Italian, Portuguese, Russian, Hindi, Spanish, Turkish, Thai, Vietnamese, Indonesian, Japanese, Korean.
- Two independent formats: vertical 9:16 and horizontal 16:9.
- Egypt uses the existing Goldx Manager data; international language versions use XAU/USD from Metals-API and currency rates from ExchangeRatesAPI.
- Localized on-screen text and TTS per language.
- Automated video generation every 3 hours, independent rotation for each aspect ratio.
- Publishing connectors: Facebook, Instagram, Threads, YouTube, TikTok.
- Live scheduling and a persistent worker; language sequence is one hour per language.
- Central WordPress administration, diagnostics, logs, and safe credential storage.

## Required architecture

1. Price adapter layer: Goldx Manager, Metals-API, ExchangeRatesAPI; cache snapshots and source timestamps; never silently label stale data as current.
2. Rendering core: preserve the existing Arabic presentation-form shaping + ASS/libass path. Separate text shaping, scene composition, and encoding. Use atomic temp files and validate output.
3. Language/content layer: translation strings, locale formatting, titles/descriptions/hashtags, and TTS provider adapter.
4. Media library and scheduler: unique job IDs, per-format rotation, idempotent queue processing, lock/lease handling.
5. Publishing adapters: one adapter per platform, capability checks, OAuth/token health, remote post IDs, per-platform copy, retries classified as transient vs permanent.
6. Live subsystem: persistent worker outside ordinary web requests, platform session lifecycle, RTMPS ingest, FFmpeg supervision, heartbeat, reconnect, exclusive lock, graceful stop.
7. Retention subsystem: safe local-file deletion with durable state and audit trail.
8. Admin and observability: status dashboard, diagnostics, logs, per-platform results, and explicit manual start/stop controls.

## Mandatory MP4 retention policy

- Keep the local MP4 while any configured destination is queued, uploading, retrying, or otherwise unresolved.
- Once every configured destination for that video has a confirmed successful remote publish, delete the local MP4 promptly.
- If the final publishing outcome is failure, record `failed_at`; retain the local MP4 for 24 hours from that timestamp, then delete it.
- A mixed result (some success, some pending/failing) must not trigger early deletion.
- Never delete a file that is currently being rendered, uploaded, or used by a live worker.
- Delete only files whose canonical paths are inside the plugin's dedicated media directory. Reject symlinks and path traversal.
- Preserve metadata, captions, timestamps, remote IDs, and deletion outcome after the MP4 is removed.
- Cleanup must run frequently enough to honor the 24-hour deadline; a daily-only cron is insufficient for precise expiry. Use a frequent scheduled event plus a recovery sweep on admin/worker startup.

## Delivery gates

1. Baseline audit and immutable reference.
2. Price adapters and data freshness.
3. Rendering regression suite (Arabic + English, both aspect ratios).
4. TTS and 15-language content.
5. Generation queue, rotation, and media lifecycle.
6. Publishing connectors, verified independently.
7. Retention/deletion tests (all-success, mixed, final-failure + 24h, active-use protection).
8. Persistent live worker and platform-specific live capabilities.
9. Admin UX, permissions, secrets, and diagnostics.
10. Full integration and release audit.

## Release truthfulness

A feature is only marked complete after a reproducible test. A UI setting, API token being present, or PHP syntax passing is not proof of a working external integration. No real public publishing or live broadcast without the user's explicit final approval.
