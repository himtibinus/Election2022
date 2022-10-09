# HIMTI Election 2022
**HIMTI Election 2022** is an e-voting website that allows students and lecturers to vote for the next Chairman of HIMTI BINUS University. 

This website was made with love by the Research and Development Commision of HIMTI BINUS University.

## Cast your vote, right now!
Don't forget to **cast your vote** in this election by visiting [our e-voting website](https://election.himtibinus.or.id)! Please **don't abstain**! #AntiGolput #WeDontAbstain

The voting period will end on October 21, 2022.

## Guide to run the project locally

### Prerequisites
 Make sure to have `git`, `composer`, and `npm` installed on your local computer first.

### Follow these steps to run the project locally
1. Clone the repository onto your local computer. 

```git 
git clone https://github.com/himtibinus/Election2022.git
```
2. Change directory to your project
```
cd Election2022
```
3. Install `composer` dependencies
```git 
composer install
```
4. Install `npm` dependencies
```
npm install
```
5. Make a copy of `.env.example` and rename it to `.env`
```
php artisan key:generate
```
6. Create a database for this project using your preferred database tool.
7. Configure your `.env` file to connect to the database you recently created.
8. Migrate the database
```
php artisan migrate
```
9. Seed the database
```
php artisan db:seed
```
11. Start the development server
```
php artisan serve
```
12. **Congratulations, you've successfully run the project locally!**