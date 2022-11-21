INSERT INTO `openings` (`id`, `date`, `from`, `to`, `special`) VALUES
(1, '2022-11-15', '19:00', '21:00', NULL),
(2, '2022-11-17', '19:00', '21:00', NULL),
(3, '2022-11-19', '09:00', '12:00', NULL),
(4, '2022-11-22', '19:00', '21:00', NULL),
(5, '2022-11-24', '19:00', '21:00', NULL),
(6, '2022-11-26', '10:00', '12:00', 'Open day elementari/medie'),
(7, '2022-11-29', '19:00', '21:00', NULL),
(8, '2022-12-01', '19:00', '21:00', NULL),
(9, '2022-12-03', '09:00', '12:00', NULL),
(10, '2022-12-06', '19:00', '21:00', NULL),
(11, '2022-12-10', '09:00', '12:00', NULL);


INSERT INTO `reservations` (`id`, `openingId`, `userId`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2),
(5, 2, 3),
(6, 4, 4),
(7, 5, 5),
(8, 5, 6),
(9, 8, 7),
(10, 8, 8),
(11, 8, 9),
(12, 8, 10),
(13, 8, 11),
(14, 8, 1),
(15, 8, 2),
(16, 8, 1),
(17, 10, 5),
(18, 10, 7),
(19, 10, 3),
(20, 10, 5),
(21, 10, 10),
(22, 10, 1);


INSERT INTO `rules` (`id`, `order`, `content`, `parentId`) VALUES
(1, 1, 'Il presente regolamento disciplina l’utilizzo da parte del Praticante l’arrampicata sportiva (di seguito “Praticante”) della palestra di arrampicata sportiva (di seguito “Palestra”), di proprietà del Comune di Arosio e affidata alla gestione del CAI di Ar', NULL),
(2, 1, 'Il presente regolamento disciplina l’utilizzo da parte del Praticante l’arrampicata sportiva (di seguito “Praticante”) della palestra di arrampicata sportiva (di seguito “Palestra”), di proprietà del Comune di Arosio e affidata alla gestione del CAI di Arosio (di seguito “CAI”), sita in Via Buonarroti - Arosio , presso il Palazzetto dello Sport', NULL),
(3, 2, 'La pratica dell’arrampicata sportiva negli spazi del Palazzetto dello Sport è consentita dopo la presa visione e l’accettazione firmata del presente regolamento. Accettando il presente regolamento il Praticante dichiara di essere in buona salute e di non essere affetto da alcuna patologia incompatibile con la pratica dell’arrampicata sportiva', NULL),
(4, 3, 'L’accesso alla Palestra è consentito, negli orari che verranno stabiliti, ai soci del Club Alpino Italiano, in regola con il tesseramento per l’anno in corso, previo il pagamento della quota d’uso deliberata dal Consiglio Direttivo della Sezione a titolo di rimborso spese', NULL),
(5, 4, 'Il “CAI” non svolge alcuna attività di istruzione o di ausilio alla attività di arrampicata, che viene quindi svolta dal “Praticante” in modo autonomo o insieme a compagni di cordata, da lui scelti in totale autonomia e delle cui capacità ed esperienza il “CAI” non risponde', NULL),
(6, 5, 'Il “Praticante” è consapevole dei rischi connessi alla pratica dell’arrampicata sportiva e conscio delle necessità di rapportare la propria attività alle proprie capacità tecniche ed alla propria esperienza, nonché a quella dei compagni di cordata prescelti', NULL),
(7, 6, 'Il “Praticante” è esclusivamente responsabile dell’adeguatezza, della qualità e delle conformità alle norme CE delle attrezzature individuali e di cordata che introduce ed utilizza nella “Palestra”', NULL),
(8, 7, 'Il “CAI” garantisce la presenza costante all’interno della Palestra presso il Palazzetto dello Sport di personale formato per la gestione di eventuali emergenze di natura tecnica e per l’attivazione dei soccorsi in caso di emergenza sanitaria', NULL),
(9, 8, 'Il “CAI” non è responsabile della custodia dei materiali e di qualunque altro bene di proprietà del “Praticante” durante la permanenza all’interno della “Palestra” e nel posteggio antistante', NULL),
(10, 9, 'I minorenni, per la frequentazione dell’area di arrampicata con la corda, devono obbligatoriamente essere accompagnati ed assistiti da un genitore, firmatario del presente regolamento. E’ onere del genitore, firmatario del presente regolamento, verificare che il minorenne abbia compreso correttamente le modalità di utilizzo della struttura così come indicate nel presente regolamento. E’ fatto divieto per i MINORI di 16 anni, assicurare chi arrampica, anche se è il genitore stesso', NULL),
(11, 10, 'Il “Praticante” esonera espressamente il “CAI” da qualunque responsabilità per i danni che gli possono derivare in conseguenza della propria attività di arrampicata o di collaborazione ed ausilio dell’attività di arrampicata altrui ed è esclusivamente responsabile per quelli che possono derivare ad altri frequentatori della “Palestra”', NULL),
(12, 11, 'Il “Praticante” si impegna all’osservanza delle seguenti norme comportamentali:', NULL),
(13, 1, 'L’ingresso della “Palestra” è consentito unicamente previa esibizione della tessera CAI in corso di validità unitamente a documento di identità e  tessera di accesso personale e non cedibile. Il personale del “CAI” che venga a conoscenza della violazione dell’obbligo di non cedere la tessera a terzi è autorizzato a chiedere la restituzione della tessera stessa, senza che ciò derivi per il “CAI” l’obbligo di restituire al ”Praticante” il corrispettivo già versato', 11),
(14, 2, 'Il “Praticante” durante l’attività all’interno della “Palestra” deve adottare un comportamento educato, diligente e igienico', 11),
(15, 3, 'All’interno della “Palestra” è vietato fumare, introdurre animali e in generale, svolgere qualunque attività incompatibile con l’arrampicata', 11),
(16, 4, 'Il materiale, la struttura d’arrampicata e i servizi igienici vanno lasciati in perfetto ordine. Al termine dell’utilizzo tutti i locali devono essere lasciati puliti', 11),
(17, 5, 'Il personale di servizio del “CAI” è autorizzato ad allontanare il “Praticante” dalla “Palestra” qualora questo ponga in essere un comportamento non conforme al presente regolamento, senza che ciò comporti per il “CAI” l’obbligo di restituire al ”Praticante” il corrispettivo già versato. Il “Praticante” è altresì tenuto ad attenersi a quanto indicato dal personale di servizio', 11),
(18, 12, 'Il “Praticante” si impegna all’osservanza delle seguenti norme tecniche:', NULL),
(19, 1, 'L’accesso alla struttura è consentito solo utilizzando scarpe da ginnastica pulite ed asciutte, mentre alla “Palestra di arrampicata” è consentito solo utilizzando scarpe da arrampicata anche esse pulite ed asciutte', 12),
(20, 2, 'All’interno della “Palestra” è fatto obbligo a tutti gli arrampicatori di utilizzare esclusivamente magnesite in palline. E’ vietato introdurre magnesite in polvere', 12),
(21, 3, 'E’ vietato al “Praticante” posizionare prese e connettori di sicurezza, tracciare vie e spostare prese ', 12),
(22, 4, 'Il “Praticante” deve segnalare al personale del “CAI” l’eventuale presenza di appigli e appoggi allentati', 12),
(23, 5, 'Nell’area con corda è consentito arrampicare per ciascuna via ad una cordata per volta, composta da un assicuratore ed un salitore', 12),
(24, 6, 'Nell’area con corda è vietato arrampicare sopra persone che stazionano nella possibile zona di caduta e nella direzione di caduta di chi si trova più in alto', 12),
(25, 7, 'La salita da capo cordata è possibile nei percorsi stabiliti impiegando la corda personale. E’ consentito il solo uso di corde intere dinamiche omologate di lunghezza uguale o superiore a 20 m (non sono ammesse mezze corde), legate direttamente all’imbragatura con nodo a otto o bulino infilato ed utilizzando tutti i rinvii intermedi per assicurarsi correttamente con la corda. L’assicurazione dell’arrampicatore deve essere effettuata con attrezzi di assicurazione autobloccanti omologati. Raggiunta la sommità dell’itinerario è obbligatorio far passare la corda in entrambi i moschettoni dell’ancoraggio finale', 12),
(26, 8, 'Nell’area con corda il “Praticante” che assicura deve posizionarsi alla base del muro e prestare la massima attenzione durante l’arrampicata del proprio compagno. Ai fini della sicurezza, sarebbe opportuno che chi assicura non abbia un peso eccessivamente inferiore a chi sta salendo', 12);


INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `isAdmin`) VALUES
(1, 'bilbo.baggins', 'Bilbo', 'Baggins', 'bilbo.baggins@middleearth.org', 1, '$2y$15$xqCWlrbLwjLdItODXETRHO1yz7v.AKrW0Y3ohr4lXS36.mJ/reYp6'),
(2, 'frodo.baggins', 'Frodo', 'Baggins', 'frodo.baggins@middleearth.org', 0, '$2y$15$xqCWlrbLwjLdItODXETRHO1yz7v.AKrW0Y3ohr4lXS36.mJ/reYp6'),
(3, 'merry.brandybuck', 'Merry', 'Brandybuck', 'merry.brandybuck@middleearth.org', 0, '$2y$15$xqCWlrbLwjLdItODXETRHO1yz7v.AKrW0Y3ohr4lXS36.mJ/reYp6'),
(4, 'aragorn', 'Aragorn', '', 'aragorn@middleearth.org', 0, '$2y$15$xqCWlrbLwjLdItODXETRHO1yz7v.AKrW0Y3ohr4lXS36.mJ/reYp6'),
(5, 'galadriel', 'Galadriel', '', 'galadriel@middleearth.org', 0, '$2y$15$xqCWlrbLwjLdItODXETRHO1yz7v.AKrW0Y3ohr4lXS36.mJ/reYp6'),
(6, 'gandalf', 'Gandalf', '', 'gandalf@middleearth.org', 0, '$2y$15$xqCWlrbLwjLdItODXETRHO1yz7v.AKrW0Y3ohr4lXS36.mJ/reYp6'),
(7, 'gimli', 'Gimli', '', 'gimli@middleearth.org', 0, '$2y$15$xqCWlrbLwjLdItODXETRHO1yz7v.AKrW0Y3ohr4lXS36.mJ/reYp6'),
(8, 'legolas', 'Legolas', '', 'legolas@middleearth.org', 0, '$2y$15$xqCWlrbLwjLdItODXETRHO1yz7v.AKrW0Y3ohr4lXS36.mJ/reYp6'),
(9, 'saruman', 'Saruman', '', 'saruman@middleearth.org', 0, '$2y$15$xqCWlrbLwjLdItODXETRHO1yz7v.AKrW0Y3ohr4lXS36.mJ/reYp6'),
(10, 'sauron', 'Sauron', '', 'sauron@middleearth.org', 0, '$2y$15$xqCWlrbLwjLdItODXETRHO1yz7v.AKrW0Y3ohr4lXS36.mJ/reYp6'),
(11, 'samwise.gamgee', 'Samwise', 'Gamgee', 'samwise.gamgee@middleearth.org', 0, '$2y$15$xqCWlrbLwjLdItODXETRHO1yz7v.AKrW0Y3ohr4lXS36.mJ/reYp6'),
(12, 'pippin.took', 'Pippin', 'Took', 'pippin.took@middleearth.org', 0, '$2y$15$xqCWlrbLwjLdItODXETRHO1yz7v.AKrW0Y3ohr4lXS36.mJ/reYp6');
