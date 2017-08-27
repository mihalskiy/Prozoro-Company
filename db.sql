CREATE TABLE secretary (
    id SERIAL PRIMARY KEY, 
    secretarySite VARCHAR(255),
    secretaryForm VARCHAR(255),
    secretaryAddres TEXT,
    secretaryWork VARCHAR(255),
    secretaryCustomer VARCHAR(255),
    secretaryInputPrice VARCHAR(255),
    secretaryBank VARCHAR(255) DEFAULT 'Ні',
    secretaryBankWork VARCHAR(255) DEFAULT 'Ні',
    secretaryDateStart DATE,
    secretaryDateOver DATE,
    secretaryDateAuction DATE,
    secretaryResultAction VARCHAR(255),
    secretarySumWinner VARCHAR(255),
    secretaryResultActionAbout VARCHAR(255)
)


CREATE TABLE calculator (
    id_calculator SERIAL PRIMARY KEY,
	calculatorDownloadFile VARCHAR(255),
    FOREIGN KEY (id_calculator) REFERENCES secretary(id)
)

CREATE TABLE lawyer (
    id_lawyer SERIAL PRIMARY KEY,
	lawyerDownloadDocument VARCHAR(255),
    FOREIGN KEY (id_lawyer) REFERENCES secretary(id)
)



CREATE TABLE accountant (
    id_accountant  SERIAL PRIMARY KEY,
	accountantBankGarant VARCHAR(255),
	accountantDateBankGarante DATE,
    FOREIGN KEY (id_accountant) REFERENCES secretary(id)
)

CREATE TABLE business (
    id_business SERIAL PRIMARY KEY,
	businessDocumentOver VARCHAR(255),
    FOREIGN KEY (id_business) REFERENCES secretary(id)
)

CREATE TABLE admin (
	id_admin SERIAL PRIMARY KEY,
	adminDateagreement DATE,
	adminDateStartWork DATE,
	adminDateFinishWork DATE,
	FOREIGN KEY (id_admin) REFERENCES secretary(id)
)