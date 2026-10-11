# Πρόοδος έργου

## 2026-10-11

### Ολοκληρώθηκαν

- **Στήσιμο repo:** `.gitignore`, `.gitattributes`, `.env.example`, `CLAUDE.md`, `docs/PROGRESS.md`.
- **Σύνδεση REST API** με Application Password (χρήστης `CC-Agent`, ρόλος administrator). Επιτυχή GET σε `users/me`, `plugins`, `themes`, `pages`.
- **Διάγνωση και λύση πιστοποίησης:**
  - Αρχικά όλα τα αιτήματα με auth έδιναν `401 rest_not_logged_in`, ακόμη και με λάθος στοιχεία.
  - Διαγνωστικό PHP αρχείο έδειξε ότι το Authorization header φτάνει κανονικά στο PHP — άρα το `.htaccess` block δεν ήταν το πρόβλημα.
  - Η απενεργοποίηση του maintenance plugin δεν άλλαξε κάτι.
  - Λύση: mu-plugin `rest-app-password-fix.php` (filter `application_password_is_api_request`). Αντίγραφο στο `wp-content/mu-plugins/`.
- **Διαγραφή** του διαγνωστικού `authdiag-7f3k.php` από τον server (επιβεβαιώθηκε 2026-10-11).
- **Maintenance plugin** ξανά ενεργό (επιβεβαιώθηκε 2026-10-11).

### Ευρήματα

- **Σελίδα 59** «Εξειδικευμένες Υπηρεσίες» έχει slug `δημοσίου-τομέα`, ενώ υπάρχει ξεχωριστή σελίδα 102 «Δημοσίου Τομέα» (`dimosios-tomeas`).
- **Ανάμεικτα slugs:** άλλα σε greeklish (`idiotes`, `logistikes`, …), τα περισσότερα σε ελληνικά (γίνονται `%ce%..` στο URL).
- **Επίπεδη ιεραρχία:** και οι 23 σελίδες είναι κορυφαίου επιπέδου· η δομή υπάρχει μόνο στο μενού.
- **Akismet** ανενεργό.
- **WP Super Cache** εγκατεστημένο, αλλά με caching off (από έλεγχο στο wp-admin, θα επιβεβαιωθεί στο audit).
- **Wordfence WAF** σε Basic protection (όχι Extended) (από έλεγχο στο wp-admin, θα επιβεβαιωθεί στο audit).
- **2FA:** 0 από 2 χρήστες (από έλεγχο στο wp-admin, θα επιβεβαιωθεί στο audit).
- **Namespace `mcp`** στο REST API χωρίς αντίστοιχο plugin στη λίστα (πιθανόν από mu-plugin ή κώδικα theme — να εξεταστεί).
- **Χωρίς child theme** (Kadence χρησιμοποιείται απευθείας).

### Επόμενα βήματα

- **Πλήρες audit** του dev site (μόνο GET): περιεχόμενο σελίδων, μενού, media, ρυθμίσεις Rank Math, Polylang (γλώσσες/μεταφράσεις), φόρμες, ασφάλεια, απόδοση.
