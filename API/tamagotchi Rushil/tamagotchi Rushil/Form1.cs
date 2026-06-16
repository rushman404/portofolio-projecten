namespace tamagotchi_Rushil
{
    public partial class Form1 : Form
    {
        private int score = 0;
        public Form1()
        {
            InitializeComponent();
        }
        // Rushil Hoelas
        private void Start_Click(object sender, EventArgs e)
        {
            //reset allegegevens
            fotoAbu.Image = Properties.Resources.abu_happy;
            etenBar.Value = 100;
            drinkenBar.Value = 100;
            healthBar.Value = 100;
            score = 0;
            scoreLabel.Text = "Score: 0";
            etenTimer.Start();
            drinkenTimer.Start();
            scoreTimer.Start();
            Start.Hide();
        }

        private void scoreEind()
        {
            // houd de score bij
            score++;
            scoreLabel.Text = "Score: " + score.ToString();
        }

        private void etenTimer_Tick(object sender, EventArgs e)
        {
            timerEten();
        }

        private void timerEten()
        {
            // de timer van eten gaat naar beneden
            try
            {
                if (etenBar.Value > etenBar.Minimum)
                {
                    etenBar.Increment(-1);
                    etenLabel.Text = etenBar.Value.ToString() + "%";
                }
                else
                {
                    etenTimer.Stop();
                    startHealthTimer();
                }
            }
            catch
            {
                MessageBox.Show("Er is een fout opgetreden");
            }
        }

        private void drinkenTimer_Tick(object sender, EventArgs e)
        {
            timerDrinken();
        }

        private void timerDrinken()
        {
            // de timer van drinken gaat naar beneden
            try
            {
                if (drinkenBar.Value > drinkenBar.Minimum)
                {
                    drinkenBar.Increment(-1);
                    drinkenLabel.Text = drinkenBar.Value.ToString() + "%";
                }
                else
                {
                    drinkenTimer.Stop();
                    startHealthTimer();
                }
            }
            catch
            {
                MessageBox.Show("Er is een fout opgetreden");
            }
        }

        private void healthTimer_Tick(object sender, EventArgs e)
        {
            try
            {
                timerHealth();
            }
            catch
            {
                MessageBox.Show("Er is een fout opgetreden");
            }

        }
        private void timerHealth()
        {
            // start de health timer en laat zien dat hij is overleden
            pictureBox();
            if (healthBar.Value > healthBar.Minimum)
            {
                healthBar.Increment(-1);
                healthLabel.Text = healthBar.Value.ToString() + "%";
            }
            else
            {
                healthTimer.Stop();
                scoreTimer.Stop();
                MessageBox.Show("Abu is overleden Score: " + score);
                Scores.SendScore(Program.loggedInUserSessionKey, score);
                Menu form1 = new Menu();
                form1.Show();
                this.Hide();
            }
        }

        private void etenBtn_Click(object sender, EventArgs e)
        {
            // doe er 5 bij elke klik
            etenBar.Increment(+5);
            stopHealthTimer();
            if (!etenTimer.Enabled) etenTimer.Start();
        }

        private void drinkenBtn_Click(object sender, EventArgs e)
        {
            // doe er 5 bij elke klik
            drinkenBar.Increment(+5);
            stopHealthTimer();
            if (!drinkenTimer.Enabled) drinkenTimer.Start();
        }

        private void startHealthTimer()
        {
            // start de health timer
            if (etenBar.Value == 0 && drinkenBar.Value == 0)
            {
                if (!healthTimer.Enabled)
                {
                    healthTimer.Start();
                }
            }
        }

        private void stopHealthTimer()
        {
            // stop de health timer
            if (etenBar.Value > 0 && drinkenBar.Value > 0)
            {
                healthTimer.Stop();
            }
        }

        private void pictureBox()
        {
            // verander de foto
            if (healthBar.Value >= 75)
            {
                fotoAbu.Image = Properties.Resources.abu_happy;
            }
            else if (healthBar.Value >= 50 && healthBar.Value <= 75)
            {
                fotoAbu.Image = Properties.Resources.abusadhappy;
            }
            else if (healthBar.Value >= 25 && healthBar.Value <= 50)
            {
                fotoAbu.Image = Properties.Resources.abu_mid;
            }
            else if (healthBar.Value >= 1 && healthBar.Value < 25)
            {
                fotoAbu.Image = Properties.Resources.abu_mad;
            }
            else if (healthBar.Value == 0)
            {
                fotoAbu.Image = Properties.Resources.abudood;
            }
        }

        private void scoreTimer_Tick(object sender, EventArgs e)
        {
            scoreEind();
        }

        private void highScoresBtn_Click(object sender, EventArgs e)
        {

        }

        private void menuBtn_Click(object sender, EventArgs e)
        {
            Menu f1 = new Menu();
            f1.Show();
            this.Hide();
        }
    }
}