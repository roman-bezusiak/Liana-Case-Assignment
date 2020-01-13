# 📨 CASE ASSIGNMENT REPORT

## 📄 TASK

```txt
Case assignment:

    Customer ordered a system which allows him to collect email
    addresses with a web form. Only requirement was that the
    information needs to be stored to a database and it can contain
    only working email addresses. Programming language is PHP and
    readymade frameworks should not be used.

Required submissions:

    1. Source code
    2. Short description of:
        1. Completing the assignment
        2. How much time was used
```

## ✅ COMPLETING THE ASSIGNMENT

In this assignment the following was implemented:

- Client part of the web app
  - Main page with the email submission form
  - Status page showing whether the message was saved into DB or not
  - Styling of the client including responsive design
- Server part of the web app
  - Email validation
  - Fetching DB connection settings from a file (`Project/conf/emailSubmissionAppPGConn.ini`)
  - Email storage in **PostgreSQL DB**
  - Error handling
  - `Project/sql/main.sql` file with **email_db** DB and **email** table initialization instructions
- Overall code documentation in form of comments
- Screenshots of test runs and example DB file (`Project/Tests/email_db.db`) containing example data instances

### 🧪 TESTS

1. **Main page**

![Main page](./Tests/1_Main_page.png)

2. **Entering email**

![Entering email](./Tests/2_Entering_email.png)

3. **Successful submission**

![Successful submission](./Tests/3_Successful_submission.png)

4. **DB table data**

![DB table data](./Tests/4_DB_table_data.png)

## ⏱ USED TIME

The time used for this project is approximately ***50 hours***. It includes:

1. Planning the app structure
2. Planning the app client design
3. Setting up **PosgreSQL DB server** environment
4. Setting up **PHP server** environment
5. Writing project source code (`Project` folder)
6. **PHP** and **PostgreSQL** documentation research
7. Conspect writing (`Conspects` folder) and information search
8. Testing (`Tests` folder)
9. Code documentation
10. Writing the report

The initial deadline for the project was **December 17** (3 weeks after receiving the task), but due to my university studies I was not able to finish it in time. I asked for an extension before the deadline, but did not receive a reply. In my email I asked to make deadline **December 22**.  
  
My apologies for the late submission.

## ⚙️ OPERATING INSTRUCTIONS

In order to run the project one will need to set up:

1. **PHP server** (`Project/Run PHP server (Windows).bat`) and **PosgreSQL DB server** (`Project/sql/main.sql` file contains **email_db** DB and **email** table initialization instructions)
2. Client
