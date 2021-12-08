# Project Name: Simple Bank 
## Project Summary: This project will create a bank simulation for users. They’ll be able to have various accounts, do standard bank functions like deposit, withdraw, internal (user’s accounts)/external(other user’s accounts) transfers, and creating/closing accounts.

## Github Link:https://github.com/joeamed99/IT202-007/tree/prod 
## Website Link:https://yaa25-prod.herokuapp.com/
## Your Name: Youssef Abdelrehem 

<!--
### Line item / Feature template (use this for each bullet point)
#### Don't delete this

- [ ] \(mm/dd/yyyy of completion) Feature Title (from the proposal bullet point, if it's a sub-point indent it properly)
  -  List of Evidence of Feature Completion
    - Status: Pending (Completed, Partially working, Incomplete, Pending)
    - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
    - Pull Requests
      - PR link #1 (repeat as necessary)
    - Screenshots
      - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
        - Screenshot #1 description explaining what you're trying to show
### End Line item / Feature Template
--> 
### Proposal Checklist and Evidence

- Milestone 1
    - [x ] \(10/28/2021) User will be able to register a new account
        -  List of Evidence of Feature Completion
        - Status: completed
        - Direct Link: https://yaa25-prod.herokuapp.com/Project/register.php
        - Pull Requests
        PR link #1 https://github.com/joeamed99/IT202-007/pull/18
        - Screenshots
        - Screenshot #1 ![image](https://user-images.githubusercontent.com/90230600/141394973-6ad0c7c7-7583-4c80-9aaa-fa07dc12ede3.png)
          Screenshot #1 all form fields, requiring email/username and requiring passwords to match 
            - Screenshot #2 ![image](https://user-images.githubusercontent.com/90230600/141395884-9dc85ade-88bb-491a-b17b-bffc8450ec80.png)
          Screenshot #2 email must be unique 
          Screenshot #3 ![image](https://user-images.githubusercontent.com/90230600/141396455-be67f12a-d1e4-46bc-9f28-57a0933c15dd.png)
          Screenshot #3 hashed passwords containing up to 60 characters and require table headings 
          Screenshot #4 ![image](https://user-images.githubusercontent.com/90230600/141396772-1894e3e4-e0a1-4681-a7d4-3d2ef05e15b2.png)
          Screenshot #4    requiring unique user name 
          Screenshot #5 ![image](https://user-images.githubusercontent.com/90230600/141396936-07caf195-c67a-4544-ae8e-b4043ad8b006.png)
          Screenshot #5 username is required 
          Screenshot #6 ![image](https://user-images.githubusercontent.com/90230600/141397277-2be7ed5b-48f5-46fe-980e-0b7ea7e3d42d.png)
          Screenshot #6 notify user if username is taken w/o wiping the form 
    - [x ] \(10/31/2021) User will be able to login to their account (given they enter the correct credentials)
        -  List of Evidence of Feature Completion
        - Status:completed
        - Direct Link: https://yaa25-prod.herokuapp.com/Project/login.php
        - Pull Requests
        - PR link #1 https://github.com/joeamed99/IT202-007/pull/20
        - Screenshot #1 ![image](https://user-images.githubusercontent.com/90230600/141399546-04e2e9f8-aa35-4dcf-926f-24a0d3e287ff.png)
          Screenshot #1 login in with email 
          Screenshot #2 ![image](https://user-images.githubusercontent.com/90230600/141400126-166e5ef0-3b97-4bd3-a9f1-02ae6872c1aa.png)
          Screenshot #2 password is required to login 
          Screenshot #3 ![image](https://user-images.githubusercontent.com/90230600/141394973-6ad0c7c7-7583-4c80-9aaa-fa07dc12ede3.png)
          Screenshot #3 friendly error message
          Screenshot #4 ![image](https://user-images.githubusercontent.com/90230600/141400634-9c56d70e-1945-424a-a4d5-97c364f7fef5.png)
          Screenshot #4 fetch user role and save to session  
          Screenshot #5 ![image](https://user-images.githubusercontent.com/90230600/141401030-7b8151fd-db26-4efc-845f-c9cb3ab2d813.png)
          Screenshot #5 landing page after login 
          Screenshot #6 ![image](https://user-images.githubusercontent.com/90230600/141401223-89f4dc51-c365-4f9b-8a29-b712e615ec52.png)
          Screenshot #6 users must be logged in to view page 
    - [ x] \(10/21/2021) User will be able to logout
        -  List of Evidence of Feature Completion
        - Status: completed
        - Direct Link: https://yaa25-prod.herokuapp.com/Project/login.php
        - Pull Requests
        - PR link #1 https://github.com/joeamed99/IT202-007/pull/30
        - Screenshots
        - Screenshot #1 ![image](https://user-images.githubusercontent.com/90230600/141402709-d358ce4f-a6e0-42b0-ae41-c7e6e8bd97d9.png)
          Screenshot #1 logout redirects to login 
          unable to capture message 
    - [x ] \(10/28/2021) Basic security rules implemented
        -  List of Evidence of Feature Completion
        - Status: completed
        - Direct Link : https://yaa25-prod.herokuapp.com/Project/sql/init_db.php
        - Pull Requests
        - PR link #1 https://github.com/joeamed99/IT202-007/pull/18
        - Screenshots
        - Screenshot #1 ![image](https://user-images.githubusercontent.com/90230600/141403913-ac471220-36cf-472c-b9ea-8be371f47451.png)
          Screenshot #1 check if user is logged in 
          Screenshot #2 ![image](https://user-images.githubusercontent.com/90230600/141400634-9c56d70e-1945-424a-a4d5-97c364f7fef5.png)
          Screenshot #2 roles table 
    - [x ] \(10/28/2021) Basic Roles implemented
        -  List of Evidence of Feature Completion
        - Status: completed
        - Direct Link: https://yaa25-prod.herokuapp.com/Project/sql/init_db.php
        - Pull Requests
        - PR link #1 https://github.com/joeamed99/IT202-007/pull/19
        - Screenshots
        - Screenshot #1 ![image](https://user-images.githubusercontent.com/90230600/141400634-9c56d70e-1945-424a-a4d5-97c364f7fef5.png)
            - Screenshot #1 roles table 
              Screenshot #2 ![image](https://user-images.githubusercontent.com/90230600/141405739-4fe33b38-8cfc-46be-a4dd-ce61cffb3ece.png)
              Screenshot #2 user roles table 
              Screenshot #3 ![image](https://user-images.githubusercontent.com/90230600/141406129-cde23ca1-8e50-4849-8074-55a2f1f876f1.png)
              Screenshot #3 check specific function 

    - [ x] \(11/11/2021) Site should have basic styles/theme applied; everything should be styled
        -  List of Evidence of Feature Completion
        - Status: completed
        - Direct Link: https://yaa25-prod.herokuapp.com/Project/styles.css
        - Pull Requests
        - PR link #1 https://github.com/joeamed99/IT202-007/pull/27
        - Screenshots
        - Screenshot #1 ![image](https://user-images.githubusercontent.com/90230600/141406707-ba2961e3-a583-4199-a850-e09098a621f1.png)
          Screenshot #1 styles
    - [x ] \(10/31/2021) Any output messages/errors should be “user friendly”
        -  List of Evidence of Feature Completion
        - Status: completed
        - Direct Link: https://yaa25-prod.herokuapp.com/Project/login.php
        - Pull Requests
        - PR link #1 https://github.com/joeamed99/IT202-007/pull/20
        - Screenshots
        - Screenshot #1 ![image](https://user-images.githubusercontent.com/90230600/141394973-6ad0c7c7-7583-4c80-9aaa-fa07dc12ede3.png)
            - Screenshot #1 user friendly error message 
    - [ x] \(10/28/2021) User will be able to see their profile
        -  List of Evidence of Feature Completion
        - Status: complete
        - Direct Link: https://yaa25-prod.herokuapp.com/Project/profile.php
        - Pull Requests
        - PR link #1 https://github.com/joeamed99/IT202-007/pull/18
        - Screenshots
        - Screenshot #1 ![image](https://user-images.githubusercontent.com/90230600/141407398-f7b129eb-770f-43dd-8eff-ffd12ab14ce5.png)
          Screenshot #1 users can see profile 
    - [ x] \(10/28/2021) User will be able to edit their profile
        -  List of Evidence of Feature Completion
        - Status: complete
        - Direct Link: https://yaa25-prod.herokuapp.com/Project/profile.php
        - Pull Requests
        - PR link #1 https://github.com/joeamed99/IT202-007/pull/18
        - Screenshots
        - Screenshot #1 ![image](https://user-images.githubusercontent.com/90230600/141407758-27c23428-3892-4940-b473-b941d6e12308.png)
          Screenshot #1 edit profile 
          # Project Name: Simple Bank 
## Project Summary: This project will create a bank simulation for users. They’ll be able to have various accounts, do standard bank functions like deposit, withdraw, internal (user’s accounts)/external(other user’s accounts) transfers, and creating/closing accounts.

## Github Link:https://github.com/joeamed99/IT202-007/tree/prod 
## Website Link:https://yaa25-prod.herokuapp.com/
## Your Name: Youssef Abdelrehem 

<!--
### Line item / Feature template (use this for each bullet point)
#### Don't delete this

- [ ] \(mm/dd/yyyy of completion) Feature Title (from the proposal bullet point, if it's a sub-point indent it properly)
  -  List of Evidence of Feature Completion
    - Status: Pending (Completed, Partially working, Incomplete, Pending)
    - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
    - Pull Requests
      - PR link #1 (repeat as necessary)
    - Screenshots
      - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
        - Screenshot #1 description explaining what you're trying to show
### End Line item / Feature Template
--> 
### Proposal Checklist and Evidence
- Milestone 2
  - [ ] \(mm/dd/yyyy of completion)  Create the <span style="text-decoration:underline;">Accounts</span> table (id, account_number [unique, always 12 characters], user_id, balance (default 0), account_type, created, modified)
    -  List of Evidence of Feature Completion
      - Status: Pending (Completed, Partially working, Incomplete, Pending)
      - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
      - Pull Requests
        - PR link #1 (repeat as necessary)
      - Screenshots
        - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
          - Screenshot #1 description explaining what you're trying to show
    - [ ] \(mm/dd/yyyy of completion) Project setup steps:
    -  List of Evidence of Feature Completion
      - Status: Pending (Completed, Partially working, Incomplete, Pending)
      - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
      - Pull Requests
        - PR link #1 (repeat as necessary)
      - Screenshots
        - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
          - Screenshot #1 description explaining what you're trying to show
  - [ ] \(mm/dd/yyyy of completion) Create the <span style="text-decoration:underline;">Transactions</span> table (see reference below)
    -  List of Evidence of Feature Completion
      - Status: Pending (Completed, Partially working, Incomplete, Pending)
      - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
      - Pull Requests
        - PR link #1 (repeat as necessary)
      - Screenshots
        - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
          - Screenshot #1 description explaining what you're trying to show
  - [ ] \(mm/dd/yyyy of completion) Dashboard page
    -  List of Evidence of Feature Completion
      - Status: Pending (Completed, Partially working, Incomplete, Pending)
      - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
      - Pull Requests
        - PR link #1 (repeat as necessary)
      - Screenshots
        - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
          - Screenshot #1 description explaining what you're trying to show
  - [ ] \(mm/dd/yyyy of completion) User will be able to create a checking account
    -  List of Evidence of Feature Completion
      - Status: Pending (Completed, Partially working, Incomplete, Pending)
      - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
      - Pull Requests
        - PR link #1 (repeat as necessary)
      - Screenshots
        - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
          - Screenshot #1 description explaining what you're trying to show
  - [ ] \(mm/dd/yyyy of completion) User will be able to list their accounts
    -  List of Evidence of Feature Completion
      - Status: Pending (Completed, Partially working, Incomplete, Pending)
      - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
      - Pull Requests
        - PR link #1 (repeat as necessary)
      - Screenshots
        - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
          - Screenshot #1 description explaining what you're trying to show
  - [ ] \(mm/dd/yyyy of completion) User will be able to click an account for more information (a.ka. Transaction History page)
    -  List of Evidence of Feature Completion
      - Status: Pending (Completed, Partially working, Incomplete, Pending)
      - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
      - Pull Requests
        - PR link #1 (repeat as necessary)
      - Screenshots
        - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
          - Screenshot #1 description explaining what you're trying to show
  - [ ] \(mm/dd/yyyy of completion) User will be able to deposit/withdraw from their account(s)
    -  List of Evidence of Feature Completion
      - Status: Pending (Completed, Partially working, Incomplete, Pending)
      - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
      - Pull Requests
        - PR link #1 (repeat as necessary)
      - Screenshots
        - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
          - Screenshot #1 description explaining what you're trying to show
=======
=======
>>>>>>> 4d8bfcc1b74a178664d08ec45031a53ae0ddce92
# Project Name: Simple Bank 
## Project Summary: This project will create a bank simulation for users. They’ll be able to have various accounts, do standard bank functions like deposit, withdraw, internal (user’s accounts)/external(other user’s accounts) transfers, and creating/closing accounts.

## Github Link:https://github.com/joeamed99/IT202-007/tree/prod 
## Website Link:https://yaa25-prod.herokuapp.com/
## Your Name: Youssef Abdelrehem 

<!--
### Line item / Feature template (use this for each bullet point)
#### Don't delete this

- [ ] \(mm/dd/yyyy of completion) Feature Title (from the proposal bullet point, if it's a sub-point indent it properly)
  -  List of Evidence of Feature Completion
    - Status: Pending (Completed, Partially working, Incomplete, Pending)
    - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
    - Pull Requests
      - PR link #1 (repeat as necessary)
    - Screenshots
      - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
        - Screenshot #1 description explaining what you're trying to show
      
### End Line item / Feature Template
--> 

- Milestone 3
  [ ] \(mm/dd/yyyy of completion) User will be able to transfer between their accounts
    -  List of Evidence of Feature Completion
      - Status: Pending (Completed, Partially working, Incomplete, Pending)
      - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
      - Pull Requests
        - PR link #1 (repeat as necessary)
      - Screenshots
        - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
          - Screenshot #1 description explaining what you're trying to show
  [ ] \(mm/dd/yyyy of completion) Transaction History page
    -  List of Evidence of Feature Completion
      - Status: Pending (Completed, Partially working, Incomplete, Pending)
      - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
      - Pull Requests
        - PR link #1 (repeat as necessary)
      - Screenshots
        - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
          - Screenshot #1 description explaining what you're trying to show
  [ ] \(mm/dd/yyyy of completion) User’s profile page should record/show First and Last name
    -  List of Evidence of Feature Completion
      - Status: Pending (Completed, Partially working, Incomplete, Pending)
      - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
      - Pull Requests
        - PR link #1 (repeat as necessary)
      - Screenshots
        - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
          - Screenshot #1 description explaining what you're trying to show
  [ ] \(mm/dd/yyyy of completion) User will be able to transfer funds to another user’s account
    -  List of Evidence of Feature Completion
      - Status: Pending (Completed, Partially working, Incomplete, Pending)
      - Direct Link: (Direct link to the file or files in heroku prod for quick testing (even if it's a protected page))
      - Pull Requests
        - PR link #1 (repeat as necessary)
      - Screenshots
        - Screenshot #1 (paste the image so it uploads to github) (repeat as necessary)
          - Screenshot #1 description explaining what you're trying to show
- Milestone 4
### Intructions
#### Don't delete this
1. Pick one project type
2. Create a proposal.md file in the root of your project directory of your GitHub repository
3. Copy the contents of the Google Doc into this readme file
4. Convert the list items to markdown checkboxes (apply any other markdown for organizational purposes)
5. Create a new Project Board on GitHub
   - Choose the Automated Kanban Board Template
   - For each major line item (or sub line item if applicable) create a GitHub issue
   - The title should be the line item text
   - The first comment should be the acceptance criteria (i.e., what you need to accomplish for it to be "complete")
   - Leave these in "to do" status until you start working on them
   - Assign each issue to your Project Board (the right-side panel)
   - Assign each issue to yourself (the right-side panel)
6. As you work
  1. As you work on features, create separate branches for the code in the style of Feature-ShortDescription (using the Milestone branch as the source)
  2. Add, commit, push the related file changes to this branch
  3. Add evidence to the PR (Feat to Milestone) conversation view comments showing the feature being implemented
     - Screenshot(s) of the site view (make sure they clearly show the feature)
     - Screenshot of the database data if applicable
     - Describe each screenshot to specify exactly what's being shown
     - A code snippet screenshot or reference via GitHub markdown may be used as an alternative for evidence that can't be captured on the screen
  4. Update the checklist of the proposal.md file for each feature this is completing (ideally should be 1 branch/pull request per feature, but some cases may have multiple)
    - Basically add an x to the checkbox markdown along with a date after
      - (i.e.,   - [x] (mm/dd/yy) ....) See Template above
    - Add the pull request link as a new indented line for each line item being completed
    - Attach any related issue items on the right-side panel
  5. Merge the Feature Branch into your Milestone branch (this should close the pull request and the attached issues)
    - Merge the Milestone branch into dev, then dev into prod as needed
    - Last two steps are mostly for getting it to prod for delivery of the assignment 
  7. If the attached issues don't close wait until the next step
  8. Merge the updated dev branch into your production branch via a pull request
  9. Close any related issues that didn't auto close
    - You can edit the dropdown on the issue or drag/drop it to the proper column on the project board