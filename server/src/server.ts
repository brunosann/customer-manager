import express, { Request, Response } from "express";
import dotenv from "dotenv";
import path from "path";
import cors from "cors";
import router from "./routes";

dotenv.config();

const server = express();

server.use(cors());
server.use(express.static(path.join(__dirname, "../public")));
server.use(express.urlencoded({ extended: true }));
server.use(express.json());

server.use(router);

server.use((req: Request, res: Response) => {
  res.status(404).json({ error: "Page not found" });
});

server.listen(process.env.PORT, () => {
  console.log(`Running at http://localhost:${process.env.PORT}`);
});
