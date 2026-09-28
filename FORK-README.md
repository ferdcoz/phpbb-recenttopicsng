# Recent Topics NG — ferdcoz fork

This local phpBB extension fork is based on Recent Topics NG 1.2.0, upstream
tag `v1.2.0`, commit `b0c1969fb1a4c208478b3773d9b94f84086502fc`.

Maintainer/developer: Fernando Coz (`ferdcoz`). Upstream authorship and the
GPL-2.0 license notice are retained.

## Fork features

- Adds an optional stylesheet integration for phpBB styles using the `modern`
  style path, aligning topic titles and metadata with the style hierarchy.
- Shows the last poster's avatar and calendar icon in the last-post column for
  that style. Avatar display respects phpBB's global and per-user settings.
- Adds `es_x_tu` strings so the header, dedicated page, and topic count use
  Spanish labels.
- Uses explicit group permissions: registered members, COPPA registered users,
  moderators, and administrators can view recent topics; guests and bots cannot.
- Denies `NEWLY_REGISTERED` accounts until phpBB removes them from that group
  according to the board's own new-member settings.
- Keeps the Prosilver presentation unchanged.
- Sets topic titles and metadata to sizes aligned with the supported style's
  forum rows.

Package: `ferdcoz/recenttopicsng`; current local fork version: `1.2.0-ferdcoz.5`.
