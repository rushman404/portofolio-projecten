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
    public partial class Menu : Form
    {
        public Menu()
        {
            InitializeComponent();
        }

        private void gameBtn_Click(object sender, EventArgs e)
        {
            Form1 form1 = new Form1();
            form1.Show();
            this.Hide();
        }

        private void scoreBtn_Click(object sender, EventArgs e)
        {
            highScores form1 = new highScores();
            form1.Show();
            this.Hide();
        }
    }
}
