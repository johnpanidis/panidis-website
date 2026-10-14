# Καταγραφή επεξεργασιών και cookies

- **2026-10-12:** αρχική καταγραφή (GET στο REST API, δημόσια DNS/RDAP, αρχεία του repo).
- **2026-10-14:** ενημέρωση με τις αποφάσεις και αλλαγές του John στο site και με τον έλεγχο των πιστοποιήσεων DPF.

Το frontend είναι πίσω από το maintenance mode, οπότε τα cookies των σελίδων **δεν επαληθεύτηκαν σε πραγματική επίσκεψη** (βλ. «Μη επιβεβαιωμένα»).

## Υπεύθυνος επεξεργασίας

ΠΑΝΙΔΗΣ ΗΛΙΑΣ ΚΑΙ ΙΩΑΝΝΗΣ Ο.Ε. — ΑΦΜ 800425329, ΔΟΥ Γιαννιτσών **[ΠΡΟΣ ΕΠΙΒΕΒΑΙΩΣΗ]**, ΓΕΜΗ 121853547000, Βελίκα Ρώμα 12, 58100 Γιαννιτσά, info@panidis.eu. DPO: δεν έχει οριστεί.

Οι πελάτες του γραφείου ενημερώνονται για την επεξεργασία των δεδομένων τους μέσω της σύμβασης συνεργασίας (από 01/01/2027 όλοι οι πελάτες με σύμβαση που περιλαμβάνει σχετική αναφορά). Η πολιτική του site καλύπτει μόνο τη χρήση του site.

## Αποφάσεις και ρυθμίσεις (John, 2026-10-14)

| Θέμα | Απόφαση / ρύθμιση | Επαλήθευση |
|---|---|---|
| Διατήρηση αιτημάτων Επικοινωνίας | 12 μήνες (εκτός αν ξεκινήσει συνεργασία) | Απόφαση |
| Διατήρηση αιτήσεων Καριέρας | 12 μήνες | Απόφαση |
| Hosting και email | IPHOST, Ελλάδα | Επιβεβαιωμένο από John· συμφωνεί με reverse DNS `eport.gr`, RIPE `IPHOST-SHARED` |
| Backups (UpdraftPlus) | Μόνο στον ίδιο server, χωρίς απομακρυσμένη αποθήκευση | Απόφαση |
| Google reCAPTCHA | Αφαιρέθηκε από τις φόρμες #3 και #4 | **GET:** καμία φόρμα δεν έχει πεδίο recaptcha |
| Anti-spam | Honeypot του Fluent Forms (χωρίς cookies, χωρίς τρίτους) | Ρύθμιση John (global setting — μη αναγνώσιμο μέσω REST, 403) |
| Καταγραφή IP (Fluent Forms) | Disable IP Logging ενεργό | Ρύθμιση John (μη αναγνώσιμο μέσω REST) |
| AddToAny | Απενεργοποιήθηκε | **GET:** inactive |
| Polylang | Γλώσσα από URL (κατάλογος), χωρίς ανίχνευση browser, cookie `pll_language` απενεργοποιημένο με mu-plugin `polylang-no-cookie.php` (`PLL_COOKIE=false`) | Αντίγραφο mu-plugin στο repo |

## Φόρμες (Fluent Forms)

| Φόρμα | Σελίδα | Πεδία | Αποθήκευση | Ειδοποίηση | Προστασία |
|---|---|---|---|---|---|
| #3 «Στοιχεία Επικοινωνίας» | 78 Επικοινωνία | Ονοματεπώνυμο/Επωνυμία*, Email*, Τηλέφωνο* (πεδίο αριθμού), Μήνυμα*, GDPR checkbox* («Έχω διαβάσει και συμφωνώ με τους Όρους Χρήσης.») | Βάση WordPress, χωρίς IP | Email προς info@panidis.eu | Honeypot |
| #4 «Καριέρα» | 80 Καριέρα | Ονοματεπώνυμο*, Email*, Τηλέφωνο* (αριθμός), Σύντομη παρουσίαση/Μήνυμα* — **χωρίς GDPR checkbox**, χωρίς επισύναψη | Βάση WordPress, χωρίς IP | Email προς info@panidis.eu (reply-to ο αιτών) | Honeypot |
| #1, #2 (demo) | — (μη ενσωματωμένες) | — | — | — | Για διαγραφή |

\* υποχρεωτικό.

## Υπηρεσίες που επεξεργάζονται δεδομένα επισκεπτών

| Υπηρεσία | Δεδομένα | Πού | Διαβίβαση εκτός ΕΟΧ |
|---|---|---|---|
| Hosting (ιστότοπος, βάση, backups, email) | Όλα τα δεδομένα του site, αρχεία καταγραφής, email | IPHOST, Ελλάδα — 93.174.123.217 (dev, live και mail στον ίδιο server· MX = panidis.eu, SPF ip4:93.174.123.217) | Όχι |
| Fluent Forms | Πεδία φορμών (χωρίς IP) | Βάση WordPress, email | Όχι |
| Wordfence | IP, αιτήματα, αποτυχημένες συνδέσεις | Βάση WordPress· ορισμένες λειτουργίες (π.χ. γεωεντοπισμός IP) επικοινωνούν με Defiant Inc. | ΗΠΑ — **SCC** (η Defiant δεν είναι στο DPF) **[ΠΡΟΣ ΕΠΙΒΕΒΑΙΩΣΗ: αποδοχή SCC/DPA, ενεργές λειτουργίες]** |
| Χάρτης Google (iframe, σελίδα 78) | IP, cookies Google | Google | ΗΠΑ — Google LLC στο **DPF** |
| Google Fonts (Manrope) | IP, browser | Google | ΗΠΑ — Google LLC στο **DPF** → τοπική φόρτωση (Φάση 3) |
| cdnjs (Tabler Icons) | IP, browser | Cloudflare | ΗΠΑ — Cloudflare, Inc. στο **DPF** → τοπική φόρτωση (Φάση 3) |
| UpdraftPlus | Αντίγραφα βάσης/αρχείων | Ίδιος server (IPHOST) | Όχι · **[ΠΡΟΣ ΕΠΙΒΕΒΑΙΩΣΗ: πλήθος/διάρκεια αντιγράφων]** |
| Σχόλια WordPress | Όνομα, email, IP | Βάση WordPress | Όχι · σχόλια ανοιχτά ως προεπιλογή (audit A5) |

Δεν βρέθηκαν plugins στατιστικής ή διαφήμισης.

### Έλεγχος πιστοποιήσεων EU–U.S. Data Privacy Framework (2026-10-14)

Η επίσημη λίστα (dataprivacyframework.gov) φορτώνεται μόνο με JavaScript και δεν ήταν αναγνώσιμη αυτόματα· ο έλεγχος έγινε στις δημόσιες πολιτικές των εταιρειών:

| Εταιρεία | Αποτέλεσμα | Πηγή |
|---|---|---|
| Google LLC | Πιστοποιημένη (EU–U.S. και Swiss–U.S. DPF) | https://policies.google.com/privacy/frameworks |
| Cloudflare, Inc. | Πιστοποιημένη (EU–U.S. DPF, UK Extension, Swiss–U.S. DPF) — πολιτική σε ισχύ από 4/11/2025 | https://www.cloudflare.com/privacypolicy/ |
| Defiant, Inc. (Wordfence) | **Όχι** — χρησιμοποιεί τυποποιημένες συμβατικές ρήτρες (SCC). Οι σελίδες της Wordfence δεν ήταν αναγνώσιμες αυτόματα· βάση: δημοσίευση Wordfence 11/2024 και τρίτες πηγές | https://www.wordfence.com/blog/2024/11/wordfence-price-increases-coming-december-5th-2024/, https://www.wordfence.com/help/general-data-protection-regulation/ |

Προτείνεται επιβεβαίωση στη λίστα https://www.dataprivacyframework.gov/s/participant-search πριν το launch.

## Cookies

| Όνομα | Πάροχος | Σκοπός | Διάρκεια | Κατηγορία | Επιβεβαίωση |
|---|---|---|---|---|---|
| wordpress_test_cookie | WordPress | Έλεγχος cookies στη σύνδεση | Συνεδρία | Απαραίτητο | Γνωστή συμπεριφορά core |
| wordpress_logged_in_*, wordpress_sec_* | WordPress | Σύνδεση διαχειριστών | Συνεδρία/14 ημ. | Απαραίτητο | Μόνο διαχειριστές |
| wp-settings-*, wp-settings-time-* | WordPress | Ρυθμίσεις διαχείρισης | 1 έτος | Απαραίτητο | Μόνο διαχειριστές |
| wfwaf-authcookie-* | Wordfence | Αναγνώριση διαχειριστή από WAF | 12 ώρες | Απαραίτητο | **Παρατηρήθηκε** (Set-Cookie, Max-Age=43200) |
| wf_loginalerted_* | Wordfence | Ειδοποιήσεις σύνδεσης (όταν είναι ενεργές) | έως 1 έτος | Απαραίτητο | Μόνο διαχειριστές |
| comment_author_* | WordPress | Στοιχεία σχολιαστή (με επιλογή) | 1 έτος | Λειτουργικότητας | Μόνο αν υποβληθεί σχόλιο |
| NID, AEC, SOCS, __Secure-* | Google | Χάρτης | έως 13 μήνες | Τρίτων (συναίνεση) | Ενδεικτικά — ορίζονται από τη Google |

**Καταργήθηκαν (2026-10-14):** `pll_language` (Polylang, mu-plugin), `_GRECAPTCHA` (reCAPTCHA αφαιρέθηκε). AddToAny απενεργοποιημένο.

## Μη επιβεβαιωμένα (πίσω από το maintenance)

Ποια cookies ορίζονται πραγματικά στους επισκέπτες και αν φορτώνεται κάποιο script τρίτου στο header/footer του θέματος. Επανέλεγχος με σάρωση cookies μετά την απενεργοποίηση του maintenance.
