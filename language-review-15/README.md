# GoldNow — 15-language translation review

Working artifact for the supplied `goldnow-15.zip` archive.

- Repository: `altaqrergold/goldnow`
- Working branch: `work/multilingual-auto-posts-15-languages`
- The patch changes 11 language templates only: de, es, id, it, ja, ko, pt, ru, th, tr, vi.
- Arabic, English, French, and Hindi templates are unchanged.
- The patch preserves layout, URLs, gold-price calculations, and the 8-gram coin calculation.

## Apply the patch to the supplied archive

1. Extract `goldnow-15.zip`.
2. Download this file and decode/decompress it:
   ```sh
   base64 -d goldnow-15.patch.gz.b64 | gzip -d > language-review-15.patch
   ```
3. From the directory containing the 15 PHP templates, apply:
   ```sh
   patch -p1 < language-review-15.patch
   ```

The corrected full archive is also attached in the ChatGPT conversation as `goldnow-15-reviewed.zip`.

Static validation: all 15 PHP files passed `php -l`; the patch was tested against a fresh extraction and reproduced the corrected files. Live WordPress rendering has not yet been tested.
