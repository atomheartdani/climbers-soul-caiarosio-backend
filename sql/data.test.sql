INSERT INTO `ClimbersSoulOpenings` (`id`, `date`, `from`, `to`, `special`, `maxReservations`) VALUES
(1, '2022-11-15', '19:00', '21:00', NULL, 8),
(2, '2022-11-17', '19:00', '21:00', NULL, 8),
(3, '2022-11-19', '09:00', '12:00', NULL, 8),
(4, '2022-11-22', '19:00', '21:00', NULL, 8),
(5, '2022-11-24', '19:00', '21:00', NULL, 8),
(6, '2022-11-26', '10:00', '12:00', 'Open day elementari/medie', 8),
(7, '2022-11-29', '19:00', '21:00', NULL, 8),
(8, '2022-12-01', '19:00', '21:00', NULL, 8),
(9, '2022-12-03', '09:00', '12:00', NULL, 8),
(10, '2022-12-06', '19:00', '21:00', NULL, 8),
(11, '2022-12-10', '09:00', '12:00', NULL, 8),
(12, '2022-12-13', '19:00', '21:00', NULL, 8),
(13, '2022-12-15', '19:00', '21:00', NULL, 8),
(14, '2022-12-17', '09:00', '12:00', NULL, 8),
(15, '2022-12-20', '19:00', '21:00', NULL, 8),
(16, '2022-12-22', '19:00', '21:00', NULL, 8),
(17, '2023-01-10', '19:00', '21:00', NULL, 8),
(18, '2023-01-12', '19:00', '21:00', NULL, 8),
(19, '2023-01-14', '09:00', '12:00', NULL, 8),
(20, '2023-01-17', '19:00', '21:00', NULL, 8),
(21, '2023-01-19', '19:00', '21:00', NULL, 8),
(22, '2023-01-21', '09:00', '12:00', 'Giochi di arrampicata', 8),
(23, '2023-01-24', '19:00', '21:00', NULL, 8),
(24, '2023-01-26', '19:00', '21:00', NULL, 8),
(25, '2023-01-28', '09:00', '12:00', 'Giochi di arrampicata', 8),
(26, '2023-01-31', '19:00', '21:00', NULL, 8),
(27, '2023-02-02', '19:00', '21:00', NULL, 8),
(28, '2023-02-04', '09:00', '12:00', 'Giochi di arrampicata', 8),
(29, '2023-02-07', '19:00', '21:00', NULL, 8),
(30, '2023-02-09', '19:00', '21:00', NULL, 8),
(31, '2023-02-11', '09:00', '12:00', 'Giochi di arrampicata', 8),
(32, '2023-02-14', '19:00', '21:00', NULL, 8),
(33, '2023-02-16', '19:00', '21:00', NULL, 8),
(34, '2023-02-18', '09:00', '12:00', 'Giochi di arrampicata', 8),
(35, '2023-02-21', '19:00', '21:00', NULL, 8),
(36, '2023-02-23', '19:00', '21:00', NULL, 8),
(37, '2023-02-25', '09:00', '12:00', NULL, 8),
(38, '2023-02-28', '19:00', '21:00', NULL, 8),
(39, '2023-03-02', '19:00', '21:00', NULL, 8),
(40, '2023-03-04', '09:00', '12:00', NULL, 8),
(41, '2023-03-07', '19:00', '21:00', NULL, 8),
(42, '2023-03-09', '19:00', '21:00', NULL, 8),
(43, '2023-03-11', '09:00', '12:00', NULL, 8),
(44, '2023-03-14', '19:00', '21:00', NULL, 8),
(45, '2023-03-16', '19:00', '21:00', NULL, 8),
(46, '2023-03-18', '09:00', '12:00', NULL, 8),
(47, '2023-03-21', '19:00', '21:00', NULL, 8),
(48, '2023-03-23', '19:00', '21:00', NULL, 8),
(49, '2023-03-25', '09:00', '12:00', NULL, 8),
(50, '2023-03-28', '19:00', '21:00', NULL, 8),
(51, '2023-03-30', '19:00', '21:00', NULL, 8);


INSERT INTO `ClimbersSoulReservations` (`id`, `openingId`, `userId`, `reservePartner`) VALUES
(1, 1, 1, 0),
(2, 1, 2, 0),
(3, 2, 1, 0),
(4, 2, 2, 0),
(5, 2, 3, 0),
(6, 4, 4, 0),
(7, 5, 5, 0),
(8, 5, 6, 0),
(9, 8, 7, 0),
(10, 8, 8, 0),
(11, 8, 9, 0),
(12, 8, 10, 0),
(13, 8, 11, 0),
(14, 8, 1, 0),
(15, 8, 2, 0),
(16, 10, 5, 0),
(17, 10, 7, 0),
(18, 10, 3, 0),
(19, 10, 10, 0),
(20, 10, 1, 0);


INSERT INTO `ClimbersSoulRules` (`id`, `order`, `content`, `parentId`) VALUES
(1, 1, 'Il presente regolamento disciplina l’utilizzo da parte del Praticante l’arrampicata sportiva (di seguito “Praticante”) della palestra di arrampicata sportiva (di seguito “Palestra”), di proprietà del Comune di Arosio e affidata alla gestione del CAI di Arosio (di seguito “CAI”), sita in Via Buonarroti - Arosio , presso il Palazzetto dello Sport', NULL),
(2, 2, 'La pratica dell’arrampicata sportiva negli spazi del Palazzetto dello Sport è consentita dopo la presa visione e l’accettazione firmata del presente regolamento. Accettando il presente regolamento il Praticante dichiara di essere in buona salute e di non essere affetto da alcuna patologia incompatibile con la pratica dell’arrampicata sportiva', NULL),
(3, 3, 'L’accesso alla Palestra è consentito, negli orari che verranno stabiliti, ai soci del Club Alpino Italiano, in regola con il tesseramento per l’anno in corso, previo il pagamento della quota d’uso deliberata dal Consiglio Direttivo della Sezione a titolo di rimborso spese', NULL),
(4, 4, 'Il “CAI” non svolge alcuna attività di istruzione o di ausilio alla attività di arrampicata, che viene quindi svolta dal “Praticante” in modo autonomo o insieme a compagni di cordata, da lui scelti in totale autonomia e delle cui capacità ed esperienza il “CAI” non risponde', NULL),
(5, 5, 'Il “Praticante” è consapevole dei rischi connessi alla pratica dell’arrampicata sportiva e conscio delle necessità di rapportare la propria attività alle proprie capacità tecniche ed alla propria esperienza, nonché a quella dei compagni di cordata prescelti', NULL),
(6, 6, 'Il “Praticante” è esclusivamente responsabile dell’adeguatezza, della qualità e delle conformità alle norme CE delle attrezzature individuali e di cordata che introduce ed utilizza nella “Palestra”', NULL),
(7, 7, 'Il “CAI” garantisce la presenza costante all’interno della Palestra presso il Palazzetto dello Sport di personale formato per la gestione di eventuali emergenze di natura tecnica e per l’attivazione dei soccorsi in caso di emergenza sanitaria', NULL),
(8, 8, 'Il “CAI” non è responsabile della custodia dei materiali e di qualunque altro bene di proprietà del “Praticante” durante la permanenza all’interno della “Palestra” e nel posteggio antistante', NULL),
(9, 9, 'I minorenni, per la frequentazione dell’area di arrampicata con la corda, devono obbligatoriamente essere accompagnati ed assistiti da un genitore, firmatario del presente regolamento. E’ onere del genitore, firmatario del presente regolamento, verificare che il minorenne abbia compreso correttamente le modalità di utilizzo della struttura così come indicate nel presente regolamento. E’ fatto divieto per i MINORI di 16 anni, assicurare chi arrampica, anche se è il genitore stesso', NULL),
(10, 10, 'Il “Praticante” esonera espressamente il “CAI” da qualunque responsabilità per i danni che gli possono derivare in conseguenza della propria attività di arrampicata o di collaborazione ed ausilio dell’attività di arrampicata altrui ed è esclusivamente responsabile per quelli che possono derivare ad altri frequentatori della “Palestra”', NULL),
(11, 11, 'Il “Praticante” si impegna all’osservanza delle seguenti norme comportamentali:', NULL),
(12, 1, 'L’ingresso della “Palestra” è consentito unicamente previa esibizione della tessera CAI in corso di validità unitamente a documento di identità e  tessera di accesso personale e non cedibile. Il personale del “CAI” che venga a conoscenza della violazione dell’obbligo di non cedere la tessera a terzi è autorizzato a chiedere la restituzione della tessera stessa, senza che ciò derivi per il “CAI” l’obbligo di restituire al ”Praticante” il corrispettivo già versato', 11),
(13, 2, 'Il “Praticante” durante l’attività all’interno della “Palestra” deve adottare un comportamento educato, diligente e igienico', 11),
(14, 3, 'All’interno della “Palestra” è vietato fumare, introdurre animali e in generale, svolgere qualunque attività incompatibile con l’arrampicata', 11),
(15, 4, 'Il materiale, la struttura d’arrampicata e i servizi igienici vanno lasciati in perfetto ordine. Al termine dell’utilizzo tutti i locali devono essere lasciati puliti', 11),
(16, 5, 'Il personale di servizio del “CAI” è autorizzato ad allontanare il “Praticante” dalla “Palestra” qualora questo ponga in essere un comportamento non conforme al presente regolamento, senza che ciò comporti per il “CAI” l’obbligo di restituire al ”Praticante” il corrispettivo già versato. Il “Praticante” è altresì tenuto ad attenersi a quanto indicato dal personale di servizio', 11),
(17, 12, 'Il “Praticante” si impegna all’osservanza delle seguenti norme tecniche:', NULL),
(18, 1, 'L’accesso alla struttura è consentito solo utilizzando scarpe da ginnastica pulite ed asciutte, mentre alla “Palestra di arrampicata” è consentito solo utilizzando scarpe da arrampicata anche esse pulite ed asciutte', 17),
(19, 2, 'All’interno della “Palestra” è fatto obbligo a tutti gli arrampicatori di utilizzare esclusivamente magnesite in palline. E’ vietato introdurre magnesite in polvere', 17),
(20, 3, 'E’ vietato al “Praticante” posizionare prese e connettori di sicurezza, tracciare vie e spostare prese ', 17),
(21, 4, 'Il “Praticante” deve segnalare al personale del “CAI” l’eventuale presenza di appigli e appoggi allentati', 17),
(22, 5, 'Nell’area con corda è consentito arrampicare per ciascuna via ad una cordata per volta, composta da un assicuratore ed un salitore', 17),
(23, 6, 'Nell’area con corda è vietato arrampicare sopra persone che stazionano nella possibile zona di caduta e nella direzione di caduta di chi si trova più in alto', 17),
(24, 7, 'La salita da capo cordata è possibile nei percorsi stabiliti impiegando la corda personale. E’ consentito il solo uso di corde intere dinamiche omologate di lunghezza uguale o superiore a 20 m (non sono ammesse mezze corde), legate direttamente all’imbragatura con nodo a otto o bulino infilato ed utilizzando tutti i rinvii intermedi per assicurarsi correttamente con la corda. L’assicurazione dell’arrampicatore deve essere effettuata con attrezzi di assicurazione autobloccanti omologati. Raggiunta la sommità dell’itinerario è obbligatorio far passare la corda in entrambi i moschettoni dell’ancoraggio finale', 17),
(25, 8, 'Nell’area con corda il “Praticante” che assicura deve posizionarsi alla base del muro e prestare la massima attenzione durante l’arrampicata del proprio compagno. Ai fini della sicurezza, sarebbe opportuno che chi assicura non abbia un peso eccessivamente inferiore a chi sta salendo', 17);


INSERT INTO `ClimbersSoulUsers` (`id`, `username`, `firstname`, `lastname`, `email`, `caiSection`, `tosConsent`, `updatePassword`, `password`, `canManageOpenings`, `canManageUsers`, `deletedOn`, `isVerified`) VALUES
(1, 'bilbo.baggins', 'Bilbo', 'Baggins', 'bilbo.baggins@middleearth.org', 'Arosio', 0, 0, '$2y$15$xqCWlrbLwjLdItODXETRHO1yz7v.AKrW0Y3ohr4lXS36.mJ/reYp6', 1, 1, NULL, 1),
(2, 'frodo.baggins', 'Frodo', 'Baggins', 'frodo.baggins@middleearth.org', 'Arosio', 0, 0, '$2y$15$AlIpv2pcrlaz17hntKoc8uf75xCb./oWfy3cU9Rr8L.LlX8.ZgiRS', 1, 1, NULL, 1),
(3, 'merry.brandybuck', 'Merry', 'Brandybuck', 'merry.brandybuck@middleearth.org', 'Mariano', 0, 1, '$2y$15$Qj5wG18n0w0gz.s/iap4Au9rlSQbj0EzEjE4D5Al3yLBiSlmETy62', 0, 0, NULL, 1),
(4, 'aragorn', 'Aragorn', 'Strider', 'aragorn@middleearth.org', 'Arosio', 1, 0, '$2y$15$xqCWlrbLwjLdItODXETRHO1yz7v.AKrW0Y3ohr4lXS36.mJ/reYp6', 1, 1, NULL, 0),
(5, 'galadriel', 'Galadriel', '', 'galadriel@middleearth.org', 'Arosio', 0, 0, '$2y$15$xqCWlrbLwjLdItODXETRHO1yz7v.AKrW0Y3ohr4lXS36.mJ/reYp6', 0, 0, NULL, 1),
(6, 'gandalf', 'Gandalf', '', 'gandalf@middleearth.org', 'Arosio', 0, 0, '$2y$15$xqCWlrbLwjLdItODXETRHO1yz7v.AKrW0Y3ohr4lXS36.mJ/reYp6', 0, 0, NULL, 1),
(7, 'gimli', 'Gimli', '', 'gimli@middleearth.org', 'Arosio', 0, 0, '$2y$15$xqCWlrbLwjLdItODXETRHO1yz7v.AKrW0Y3ohr4lXS36.mJ/reYp6', 0, 0, NULL, 1),
(8, 'legolas', 'Legolas', '', 'legolas@middleearth.org', 'Arosio', 0, 0, '$2y$15$xqCWlrbLwjLdItODXETRHO1yz7v.AKrW0Y3ohr4lXS36.mJ/reYp6', 0, 0, NULL, 1),
(9, 'saruman', 'Saruman', '', 'saruman@middleearth.org', 'Arosio', 0, 0, '$2y$15$xqCWlrbLwjLdItODXETRHO1yz7v.AKrW0Y3ohr4lXS36.mJ/reYp6', 0, 0, NULL, 1),
(10, 'sauron', 'Sauron', '', 'sauron@middleearth.org', 'Arosio', 0, 0, '$2y$15$xqCWlrbLwjLdItODXETRHO1yz7v.AKrW0Y3ohr4lXS36.mJ/reYp6', 0, 0, NULL, 1),
(11, 'samwise.gamgee', 'Samwise', 'Gamgee', 'samwise.gamgee@middleearth.org', 'Arosio', 0, 0, '$2y$15$xqCWlrbLwjLdItODXETRHO1yz7v.AKrW0Y3ohr4lXS36.mJ/reYp6', 0, 0, NULL, 1),
(12, 'pippin.took', 'Pippin', 'Took', 'pippin.took@middleearth.org', 'Arosio', 0, 0, '$2y$15$xqCWlrbLwjLdItODXETRHO1yz7v.AKrW0Y3ohr4lXS36.mJ/reYp6', 0, 0, NULL, 1);
