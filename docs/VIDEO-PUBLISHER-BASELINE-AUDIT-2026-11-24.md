# GoldNow Video Publisher — baseline audit and implementation notes

Date: 2026-11-24
Branch: rebuild/working-arabic-baseline
Source: user's reference archive goldnow-video-publisher.zip and standalone PHP source in Library.

## Verified source state
- WordPress plugin entry point is goldnow-video-publisher.php.
- PHP syntax passes php -l in the local working copy.
- Arabic rendering path uses ASS/libass and the manual Arabic presentation-form shaper. The existing renderer and layout were preserved.
- The lam-alef branch previously appended an array rather than a single presentation-form glyph. It now selects isolated/final lam-alef according to the preceding connection.
- The Arabic ASS font family is set to the bundled Cairo font, which is a valid TrueType file in the archive. The bundled Almarai files are HTML responses, not fonts; the code no longer selects them for Arabic ASS rendering.
- The renderer currently creates a silent audio track. TTS is not integrated yet.
- The live screen currently stores schedule settings only. There is no persistent live worker or actual live-stream lifecycle implementation in this source.
- Publishing integration currently implements Facebook only. Other listed social platforms are not yet connected/publishable through this plugin.

## MP4 retention changes
- Retention sweep is scheduled every 15 minutes rather than daily.
- Successful deletion is permitted only when at least one queue target exists and every queue item for that video is published.
- Failed files are eligible only after all queued targets have left scheduled/retrying states and 24 hours have elapsed from the latest final failure timestamp.
- Files are resolved under uploads/goldnow-videos and checked to remain inside that directory before unlink.
- The video and queue records remain in WordPress options; only the MP4 is removed.
- Failed unlink/path validation is not recorded as successful deletion, so the next sweep can retry.

## Validation completed
- PHP syntax check: passed.
- ZIP integrity test: passed.
- Arabic shaping smoke tests: لا، لأ، لإ، لآ، سلام، الذهب اليوم; all return shaped glyph strings and no Array conversion.
- GitHub source was re-read after commit to verify the lam-alef, Cairo, and retention changes are present.

## Not yet validated / not to claim complete
- No real WordPress runtime integration test against the production site.
- No visual screenshot/pixel review of Arabic output from a newly rendered MP4 on the host.
- No end-to-end upload tests for any social platform.
- No live-stream worker or platform live API tests.
- No voice/TTS output.
- Full 15-language × 2-format content, fonts, narration, and platform-specific publishing remains unfinished.
- Do not activate auto-publishing, upload, or start any live stream without the user's explicit final approval.
