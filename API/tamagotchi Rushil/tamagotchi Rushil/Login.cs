using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace tamagotchi_Rushil
{
    public partial class Login : Form
    {
        public Login()
        {
            InitializeComponent();
        }

        private void loginBtn_Click(object sender, EventArgs e)
        {
            // Haal gebruikersnaam en wachtwoord op
            string username = usernameTxt.Text;
            string password = passwordTxt.Text;

            // Probeer in te loggen via API
            User login = User.Login(username, password);

            if (login != null)
            {
                // Sla gebruiker en sessie op globaal op
                Program.loggedInUser = login;
                Program.loggedInUserSessionKey = login.sessionKey;
                MessageBox.Show($"Welkom {login.firstname} {login.lastname}!");
                Menu form1 = new Menu();
                form1.Show();
                this.Hide();
            }
        }

        private void registreerBtn_Click(object sender, EventArgs e)
        {
            Registeren form1 = new Registeren();
            form1.Show();
            this.Hide();
        }
    }
}
