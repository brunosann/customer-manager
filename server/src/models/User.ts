import { Model, DataTypes } from "sequelize";
import { sequelize } from "../instances/mysql";

interface UserInstance extends Model {
  id: number;
  name: string;
  email: string;
  password: string;
  isAdmin: boolean;
  createdAt: Date;
  updateAt: Date;
  deletedAt: Date;
}

export const User = sequelize.define<UserInstance>(
  "User",
  {
    id: {
      primaryKey: true,
      autoIncrement: true,
      type: DataTypes.INTEGER,
    },
    name: {
      type: DataTypes.STRING,
    },
    email: {
      type: DataTypes.STRING,
      unique: true,
    },
    password: {
      type: DataTypes.STRING,
    },
    isAdmin: {
      type: DataTypes.BOOLEAN,
    },
    createdAt: {
      type: DataTypes.DATE,
    },
    updatedAt: {
      type: DataTypes.DATE,
    },
    deletedAt: {
      type: DataTypes.DATE,
    },
  },
  {
    tableName: "users",
    timestamps: true,
    paranoid: true,
  }
);
