# Uploaded baseline — 2026-11-24

The user-designated source of truth is the uploaded archive `goldnow-video-publisher(1).zip`.

- Archive SHA-256: `2cec39c65674ff55e4729802ae860edf3566ca171f1c6c5ef4ab4b834d4e5c0d`
- Main plugin PHP SHA-256: `bc54e7539835ea300101a6883c9839a5ae8d5a7afb28fcbeeed8e9fdb619c9bf`
- Plugin version in uploaded source: `0.6.7-dev`
- PHP syntax check on the uploaded main plugin file: passed.
- Archive contains the plugin PHP, admin CSS, both video backgrounds, and bundled fonts.

## Authorized scope only

1. Safely manage and remove excess generated video files without deleting files tied to active/pending publishing jobs.
2. Automatically populate localized title, description, and hashtags for the selected video's language for **all supported publishing platforms**, not Facebook only.
3. Add working account connection flows for Threads and Instagram, with accurate permission/connection diagnostics.

## Explicit exclusions

- Do not alter Arabic video rendering, Arabic shaping, RTL handling, Arabic text, fonts, or video design.
- Do not change unrelated rendering, pricing, scheduling, live, dashboard, or other plugin behavior.
- Do not publish content or start a live stream during development.
- Keep changes isolated and inspect the final diff against this uploaded baseline.
