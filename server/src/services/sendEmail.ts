import nodemailer from "nodemailer";
import handlebars from "handlebars";
import path from "path";
import { readFileSync } from "fs";
import dotenv from "dotenv";

dotenv.config();

type EmailMessageData = {
  to: string;
  subject: string;
  html: string;
  text: string;
};

export const sendMail = async (message: EmailMessageData): Promise<void> => {
  const transport = nodemailer.createTransport({
    host: process.env.MAIL_HOST as string,
    port: Number(process.env.MAIL_PORT),
    auth: {
      user: process.env.MAIL_USER,
      pass: process.env.MAIL_PASS,
    },
  });

  const data = {
    from: "Gerenciador de Clientes <contato@devteixeira.com.br>",
    ...message,
  };
  await transport.sendMail(data);
};

export const emailForgotPassword = async (code: string, to: string) => {
  const filePath = path.join(__dirname, "../../public/forgotPassword.html");
  const source = readFileSync(filePath, "utf-8").toString();
  const template = handlebars.compile(source);
  const replacements = { code };
  const htmlToSend = template(replacements);

  const message = {
    to,
    subject: "Recuperação de senha",
    html: htmlToSend,
    text: "Código de recuperação de senha: " + code,
  };

  await sendMail(message);
};
