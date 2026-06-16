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
    public partial class Registeren : Form
    {
        public Registeren()
        {
            InitializeComponent();
        }

        private void registrerenBtn_Click(object sender, EventArgs e)
        {
            // Haal invoergegevens uit textboxen
            string firstname = firstnameTxt.Text;
            string lastname = lastnameTxt.Text;
            string email = emailTxt.Text;
            string username = usernameTxt.Text;
            string password = passwordTxt.Text;

            if (firstname.Length < 3 || lastname.Length < 3 || username.Length < 3 || password.Length < 3 || !email.Contains("@"))
            {
                MessageBox.Show("Vul alle velden correct in!");
                return;
            }

            // Roep registratie-methode aan
            bool success = User.Registeren(firstname, lastname, email, username, password);

            if (success)
            {
                MessageBox.Show("Registratie gelukt!");

                Login form1 = new Login();
                form1.Show();
                this.Close();
            }
            else
            {
                MessageBox.Show("Registratie mislukt");
            }
        }

        private void loginBtn_Click(object sender, EventArgs e)
        {
            Login form1 = new Login();
            form1.Show();
            this.Close();
        }
    }
}
