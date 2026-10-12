# Καταγραφή επεξεργασιών και cookies — 2026-10-12

Πηγές: GET στο REST API του dev.panidis.eu, δημόσια DNS/RDAP, αρχεία του repo. Το frontend είναι πίσω από το maintenance mode, οπότε τα cookies των σελίδων **δεν επαληθεύτηκαν σε πραγματική επίσκεψη** (βλ. «Μη επιβεβαιωμένα»).

## Υπεύθυνος επεξεργασίας

ΠΑΝΙΔΗΣ ΗΛΙΑΣ ΚΑΙ ΙΩΑΝΝΗΣ Ο.Ε. — ΑΦΜ 800425329, ΔΟΥ Γιαννιτσών, ΓΕΜΗ 121853547000, Βελίκα Ρώμα 12, 58100 Γιαννιτσά, info@panidis.eu. DPO: δεν έχει οριστεί.

## Φόρμες (Fluent Forms)

| Φόρμα | Σελίδα | Πεδία | Αποθήκευση | Ειδοποίηση | Άλλα |
|---|---|---|---|---|---|
| #3 «Στοιχεία Επικοινωνίας» | 78 Επικοινωνία | Ονοματεπώνυμο/Επωνυμία*, Email*, Τηλέφωνο* (πεδίο αριθμού), Μήνυμα*, GDPR checkbox* («Έχω διαβάσει και συμφωνώ με τους Όρους Χρήσης.») | Βάση WordPress (`delete_entry_on_submission: no`) | Email προς info@panidis.eu (ενεργό) | reCAPTCHA v3 (χωρίς badge) |
| #4 «Καριέρα» | 80 Καριέρα | Ονοματεπώνυμο*, Email*, Τηλέφωνο* (αριθμός), Σύντομη παρουσίαση/Μήνυμα* — **χωρίς GDPR checkbox**, χωρίς επισύναψη | Βάση WordPress (`no`) | Email προς info@panidis.eu (ενεργό, reply-to ο αιτών) | reCAPTCHA v3 (με badge) |
| #1, #2 (demo) | — (μη ενσωματωμένες) | — | — | — | Για διαγραφή |

\* υποχρεωτικό. Το Fluent Forms καταγράφει κατά κανόνα και IP/browser/συσκευή στις καταχωρίσεις — **[ΠΡΟΣ ΕΠΙΒΕΒΑΙΩΣΗ]** στις γενικές ρυθμίσεις (το endpoint `/fluentform/v1/global-settings` επέστρεψε 403).

## Plugins και υπηρεσίες που επεξεργάζονται δεδομένα επισκεπτών

| Υπηρεσία | Δεδομένα | Πού | Σημείωση |
|---|---|---|---|
| Hosting (ιστότοπος, βάση, email) | Όλα τα δεδομένα του site, αρχεία καταγραφής, email | 93.174.123.217 — reverse DNS `123-217.eport.gr`, RIPE netname `IPHOST-SHARED`, GR | **[ΠΡΟΣ ΕΠΙΒΕΒΑΙΩΣΗ: ePort / IPHOST]** · ο ίδιος server φιλοξενεί dev, live (panidis.eu) και mail (MX = panidis.eu, SPF ip4:93.174.123.217) |
| Fluent Forms | Πεδία φορμών (+ IP/browser;) | Βάση WordPress, email | Το namespace `mcp` του REST προέρχεται πιθανότατα από το Fluent Forms (route `/fluentform/v1/mcp/config-snippets`) |
| Google reCAPTCHA v3 | IP, συσκευή/browser, συμπεριφορά | Google (ΗΠΑ) | Στις φόρμες #3 και #4 |
| Wordfence | IP, αιτήματα, αποτυχημένες συνδέσεις | Βάση WordPress· Defiant Inc. (ΗΠΑ) **[ΠΡΟΣ ΕΠΙΒΕΒΑΙΩΣΗ]** | Cookie `wfwaf-authcookie-*` παρατηρήθηκε (12 ώρες) |
| Polylang | Γλώσσα | Cookie `pll_language` **[ΠΡΟΣ ΕΠΙΒΕΒΑΙΩΣΗ αν ορίζεται]** | Γλώσσα από URL, browser detection off |
| AddToAny | Σελίδα που κοινοποιείται | AddToAny LLC (ΗΠΑ) | **[ΠΡΟΣ ΕΠΙΒΕΒΑΙΩΣΗ αν εμφανίζονται κουμπιά]** |
| Χάρτης Google (iframe, σελίδα 78) | IP, cookies Google | Google (ΗΠΑ) | Φορτώνεται χωρίς συναίνεση σήμερα → Φάση 2 |
| Google Fonts (Manrope) | IP, browser | Google (ΗΠΑ) | `@import` στο site.css → τοπική φόρτωση (Φάση GDPR) |
| cdnjs (Tabler Icons) | IP, browser | Cloudflare (ΗΠΑ) | `@import` στο site.css → τοπική φόρτωση |
| UpdraftPlus | Αντίγραφα βάσης/αρχείων | **[ΠΡΟΣ ΕΠΙΒΕΒΑΙΩΣΗ: τοποθεσία, διάρκεια]** | |
| Σχόλια WordPress | Όνομα, email, IP | Βάση WordPress | Ανοιχτά ως προεπιλογή, 0 άρθρα (audit A5) |

## Cookies

| Όνομα | Πάροχος | Σκοπός | Διάρκεια | Κατηγορία | Επιβεβαίωση |
|---|---|---|---|---|---|
| wordpress_test_cookie | WordPress | Έλεγχος cookies στη σύνδεση | Συνεδρία | Απαραίτητο | Γνωστή συμπεριφορά core |
| wordpress_logged_in_*, wordpress_sec_* | WordPress | Σύνδεση διαχειριστών | Συνεδρία/14 ημ. | Απαραίτητο | Μόνο διαχειριστές |
| wp-settings-*, wp-settings-time-* | WordPress | Ρυθμίσεις διαχείρισης | 1 έτος | Απαραίτητο | Μόνο διαχειριστές |
| wfwaf-authcookie-* | Wordfence | Αναγνώριση διαχειριστή από WAF | 12 ώρες | Απαραίτητο | **Παρατηρήθηκε** (Set-Cookie, Max-Age=43200) |
| wf_loginalerted_* | Wordfence | Ειδοποιήσεις σύνδεσης | έως 1 έτος | Απαραίτητο | [ΠΡΟΣ ΕΠΙΒΕΒΑΙΩΣΗ] |
| pll_language | Polylang | Γλώσσα | 1 έτος | Λειτουργικότητας | [ΠΡΟΣ ΕΠΙΒΕΒΑΙΩΣΗ] |
| comment_author_* | WordPress | Στοιχεία σχολιαστή (με επιλογή) | 1 έτος | Λειτουργικότητας | Μόνο αν υποβληθεί σχόλιο |
| _GRECAPTCHA | Google | reCAPTCHA v3 | 6 μήνες | Τρίτων — ασφάλειας | [ΠΡΟΣ ΕΠΙΒΕΒΑΙΩΣΗ: κατηγοριοποίηση/φόρτωση] |
| NID, AEC, SOCS, __Secure-* | Google | Χάρτης | έως 13 μήνες | Τρίτων (συναίνεση) | Ενδεικτικά — ορίζονται από τη Google |

Δεν βρέθηκαν plugins στατιστικής ή διαφήμισης (π.χ. Google Analytics, Meta Pixel) στη λίστα plugins.

## Μη επιβεβαιωμένα (πίσω από το maintenance)

Ποια cookies ορίζονται πραγματικά στους επισκέπτες (Polylang, reCAPTCHA, AddToAny), αν εμφανίζονται κουμπιά AddToAny, αν φορτώνεται κάποιο script τρίτου στο header/footer του θέματος. Επανέλεγχος με πραγματική επίσκεψη μετά την απενεργοποίηση του maintenance ή με σάρωση cookies.
