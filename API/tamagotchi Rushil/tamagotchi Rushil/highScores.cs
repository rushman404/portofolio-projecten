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
    public partial class highScores : Form
    {
        public highScores()
        {
            InitializeComponent();
        }

        private void highScores_Load(object sender, EventArgs e)
        {
            ToonTop10();
        }

        private void ToonTop10()
        {
            highScoresList.Items.Clear();

            // Haal top 10 scores op van API
            List<Scores> topScores = Scores.getTop10(Program.loggedInUserSessionKey);

            // Voeg header toe aan lijst
            highScoresList.Items.Add(string.Format(" {0,-5} {1,-15} {2,-10} {3, -15}", "Nr", "Naam", "Score", "Datum"));

            // Voeg alle scores toe met formatting
            foreach (var scores in topScores)
            {
                highScoresList.Items.Add(string.Format(" {0,-5} {1,-15} {2,-10} {3, -15}",
                    scores.id,
                    scores.username,
                    scores.value,
                    scores.date
                ));
            }
        }

        private void MenuBtn_Click(object sender, EventArgs e)
        {
            Menu form1 = new Menu();
            form1.Show();
            this.Hide();
        }
    }
}
