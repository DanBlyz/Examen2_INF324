using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Collections;

namespace WindowsFormsApplication2
{   //DANIEL BENJAMIN LUNA GONZALES
    public partial class Form1 : Form
    {
        Bitmap bmp;
        int x, y;
        int mr = 0, mg = 0, mb = 0;   
        Stack <string>vector = new Stack<string>();
        Random rnd = new Random();
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            openFileDialog1.Filter = "Todos|*.*|Archivos JPGE|*.jpg";
            openFileDialog1.FileName = "";
            openFileDialog1.ShowDialog();
            bmp = new Bitmap(openFileDialog1.FileName);
            pictureBox1.Image = bmp;
        }

        private void button2_Click(object sender, EventArgs e)
        {
            Color c = new Color();
            c = bmp.GetPixel(10, 10);
            textBox1.Text = c.R.ToString();
            textBox2.Text = c.G.ToString();
            textBox3.Text = c.B.ToString();
        }

        private void label3_Click(object sender, EventArgs e)
        {
        }

        private void button3_Click(object sender, EventArgs e)
        {
            Bitmap bmp2 = new Bitmap(bmp.Width, bmp.Height);
            Color c = new Color();
            for (int i = 0; i < bmp.Width; i++){
                for (int j = 0; j < bmp.Height; j++){
                    c = bmp.GetPixel(i, j);
                    bmp2.SetPixel(i, j, Color.FromArgb(c.R, 0, 0));
                }
                pictureBox1.Image = bmp2;
            }
        }

        private void button4_Click(object sender, EventArgs e)
        {
            Bitmap bmp2 = new Bitmap(bmp.Width, bmp.Height);
            Color c = new Color();
            for (int i = 0; i < bmp.Width; i++){
                for (int j = 0; j < bmp.Height; j++){
                    c = bmp.GetPixel(i, j);
                    bmp2.SetPixel(i, j, Color.FromArgb(0, 0, c.R));
                }
                pictureBox1.Image = bmp2;
            }
        }

        private void button5_Click(object sender, EventArgs e)
        {
            Bitmap bmp2 = new Bitmap(bmp.Width, bmp.Height);
            Color c = new Color();
            for (int i = 0; i < bmp.Width; i++){
                for (int j = 0; j < bmp.Height; j++){
                    c = bmp.GetPixel(i, j);
                    bmp2.SetPixel(i, j, Color.FromArgb(0, 0, c.R));
                }
                pictureBox1.Image = bmp2;
            }
        }

        private void pictureBox1_Click(object sender, EventArgs e)
        {            
        }

        private void pictureBox1_MouseClick(object sender, MouseEventArgs e)
        {
            x = e.X;
            y = e.Y;
            textBox4.Text = x.ToString();
            textBox5.Text = y.ToString();
            Color c = new Color();
            mr = 0; mg = 0; mb = 0;
            for (int i = x; i < x + 10; i++){
                for (int j = y; j < y + 10; j++){
                    c = bmp.GetPixel(i, j);
                    mr = mr + c.R;
                    mg = mg + c.G;
                    mb = mb + c.B;
                }
            }
            mr = mr / 100;
            mg = mg / 100;
            mb = mb / 100;
            textBox1.Text = mr.ToString();
            textBox2.Text = mg.ToString();
            textBox3.Text = mb.ToString();
        }
        

        private void button6_Click(object sender, EventArgs e)
        {
            Color color = new Color();
            color = bmp.GetPixel(x, y);
            Bitmap bmp2 = new Bitmap(bmp.Width, bmp.Height);
            Color color1 = new Color();
            for (int i = 0; i < bmp.Width; i++){
                for (int j = 0; j < bmp.Height; j++){
                    color1 = bmp.GetPixel(i, j);
                    if ((color.R - 10 <= color1.R) && (color1.R - 10 <= color.R + 10) &&
                        (color.G - 10 <= color1.G) && (color1.G - 10 <= color.G + 10) &&
                        (color.B - 10 <= color1.B) && (color1.B - 10 <= color.B + 10))
                    {
                        bmp2.SetPixel(i, j, Color.Fuchsia);
                    }
                    else{
                        bmp2.SetPixel(i, j, Color.FromArgb(color1.R, color1.G, color1.B));
                    }                
                }
                pictureBox1.Image = bmp2;
            }
        }

        private void button7_Click(object sender, EventArgs e)
        {
            Color cleido = new Color();
            int mrn = 0, mgn = 0, mbn = 0;
            Bitmap bmp2 = new Bitmap(bmp.Width, bmp.Height);
            Color c = new Color();
            while (vector.Count > 0){                
                string[] valor = vector.Pop().Split(';');
                int pr = Int32.Parse(valor[0]);
                int pg = Int32.Parse(valor[1]);
                int pb = Int32.Parse(valor[2]);
                int px = Int32.Parse(valor[3]);
                int py = Int32.Parse(valor[4]);
                cleido = bmp.GetPixel(px, py);
                for (int i = 0; i < bmp.Width - 10; i = i + 10){
                    for (int j = 0; j < bmp.Height - 10; j = j + 10){
                        for (int i2 = i; i2 < i + 10; i2++){
                            for (int j2 = j; j2 < j + 10; j2++){
                                c = bmp.GetPixel(i2, j2);
                                mrn = mrn + c.R;
                                mgn = mgn + c.G;
                                mbn = mbn + c.B;
                            }
                        }
                        mrn = mrn / 100;
                        mgn = mgn / 100;
                        mbn = mbn / 100;
                        if ((pr - 10 <= mrn) && (mrn - 10 <= pr + 10) &&
                          (pg - 10 <= mgn) && (mgn - 10 <= pg + 10) &&
                          (pb - 10 <= mbn) && (mbn - 10 <= pb + 10)){
                            for (int i2 = i; i2 < i + 10; i2++){
                                for (int j2 = j; j2 < j + 10; j2++){
                                    bmp.SetPixel(i2, j2, Color.FromArgb(pr,pg,pb));
                                }
                            }

                        }
                        else{
                            for (int i2 = i; i2 < i + 10; i2++){
                                for (int j2 = j; j2 < j + 10; j2++){
                                    c = bmp.GetPixel(i2, j2);
                                    bmp.SetPixel(i2, j2, Color.FromArgb(c.R, c.G, c.B));
                                }
                            }
                        }

                    }
                    pictureBox1.Image = bmp;
                }
            }
        }
        public void cambiar_color(int r, int g, int b, int x, int y)
        {
        }       

        private void button8_Click(object sender, EventArgs e)
        {
            string cadena = textBox1.Text+";"+textBox2.Text+";"+textBox3.Text+";"+x+";"+y ;
            vector.Push(cadena);
            label6.Text = vector.Count+"";
        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {

        }
    }
}
